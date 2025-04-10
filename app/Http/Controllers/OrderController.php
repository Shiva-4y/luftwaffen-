<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\IceCream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'ice_cream_id' => 'required|exists:ice_creams,id', // Ensure the ice cream ID exists
        ]);

        // Create the order
        $order = new Order();
        $order->user_id = Auth::id();  // The logged-in user's ID
        $order->ice_cream_id = $request->input('ice_cream_id');  // The selected ice cream
        $order->status = 'pending';  // You can track the order status
        $order->save();

        // Redirect to a confirmation page (or wherever you'd like)
        return redirect()->route('icorder.confirmation')->with('success', 'Your order has been placed!');
    }

    // Add a method to show the order confirmation (optional)
    public function confirmation()
    {
        return view('icorder.confirmation');
    }
    
    public function viewOrders()
    {
        // Fetch orders for the logged-in user
        $orders = Order::where('user_id', Auth::id())
            ->with('iceCream')  // Ensure related ice cream data is loaded
            ->get();

        // Pass the orders to the view
        return view('icorder.view', compact('orders'));
    }

    public function markAsPaid($orderId)
{
    // Find the order by ID
    $order = Order::findOrFail($orderId);

    // Update the order status to 'completed'
    $order->status = 'completed';
    $order->save();

    // Redirect back to the order view with a success message
    return redirect()->route('icorder.view')->with('status', 'Order marked as completed!');
}
    
}
