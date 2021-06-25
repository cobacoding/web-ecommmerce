<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class OrdersController extends Controller
{
    public function allOrders()
    {
    	$allOrders = Order::paginate(4);
    	return view('admin.order.allOrders', compact('allOrders'));
    }

    public function statusOrder(Request $request, $id)
    {
    	$status = Order::find($id);
    	$status->status = $request->status;
    	$status->save();

    	return back()->withMessage('Status Success');
    }

    public function pendingOrders()
    {
    	$pendingOrders = Order::where('status', '0')->get();
    	return view('admin.order.pendingOrders', compact('pendingOrders'));
    }

    public function deliveredOrders()
    {
    	$deliveredOrders = Order::where('status', '1')->get();
    	return view('admin.order.deliveredOrders', compact('deliveredOrders'));
    }
}
