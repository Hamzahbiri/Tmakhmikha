<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // Inside OrderController.php
public function createOrder(Request $request)
{
    $user= $request->user(); 
    // Validate and store order details
    $order = Order::create([
        'user_id' => $user->id, 
    ]);

    foreach ($request->items as $item) {
        $order->items()->create($item);
    }

    return response()->json(['message' => 'Order placed successfully']);
}





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return $orders;

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
