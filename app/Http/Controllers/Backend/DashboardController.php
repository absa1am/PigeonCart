<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = count(Order::whereDate('created_at', Carbon::today())->get());
        $totalOrders = Order::latest()->take(5)->get();
        $completedOrders = Order::where('status', 'Completed')->get();
        $user = count(User::whereDate('created_at', Carbon::today())->get());
        $totalUser = count(User::all());

        $sales = 0;
        foreach($completedOrders as $order)
            $sales += $order->grandtotal;

        $user = Auth::user();
        if($user->roles[0]->name == 'Customer') {
            return view('user-dashboard', ['user' => $user]);
        }

        return view('dashboard', ['orders' => $orders, 'totalOrders' => $totalOrders, 'sales' => $sales, 'user' => $user, 'totalUser' => $totalUser]);
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
