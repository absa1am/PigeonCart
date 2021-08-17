<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where([
            ['user_id', Auth::user()->id],
            ['status', 'Pending']])->get();

        $total = 50;
        for($item = 0; $item < count($carts); $item++) {
            $total += $carts[$item]->product->price * $carts[$item]->quantity;
        }

        return view('frontend.shopping-cart', ['carts' => $carts, 'total' => $total, 'count' => count($carts)]);
    }

    public function addToCart($productId)
    {
        $added = Cart::where([
            ['user_id', Auth::user()->id],
            ['product_id', $productId],
            ['status', 'Pending']])->first();

        if($added) {
            $added->quantity++;
            $added->save();
        } else {
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $productId,
            ]);
        }

        return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
