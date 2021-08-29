<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('backend.view-orders', ['orders' => $orders]);
    }

    public function history()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('frontend.order-history', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::where([
            ['user_id', Auth::user()->id],
            ['status', 'Pending']])->get();

        $total = 50;
        for($item = 0; $item < count($carts); $item++) {
            $total += $carts[$item]->product->price * $carts[$item]->quantity;
            $carts[$item]->status = 'Ordered';
            $carts[$item]->save();
        }

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'status' => 'Pending',
            'grandtotal' => $total
        ]);

        for($item = 0; $item < count($carts); $item++) {
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $carts[$item]->product->id,
                'quantity' => $carts[$item]->quantity,
                'price' => $carts[$item]->product->price,
                'amount' => $carts[$item]->product->price * $carts[$item]->quantity
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('backend.edit-order', ['order' => $order]);
    }

    // For customer control
    public function cancel($id)
    {
        $order = Order::findOrFail($id);
    
        $order->status = "Cancelled";
        $order->save();

        return redirect()->back();
    }

    // For customer control
    public function reorder($id)
    {
        $order = Order::findOrFail($id);

        $order->status = "Pending";
        $order->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->grandtotal = $request->grandtotal;
        $order->status = $request->status;
        $order->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return redirect()->back();
    }
}
