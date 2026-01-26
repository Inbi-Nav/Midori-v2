<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller {
    public function index() {
        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order) {
        $request->validate([
            'status' => 'required|in:' . implode(',', Order::STATUSES),
        ]);

         $order->update([
            'status' => $request->status,
        ]);
        return back()->with('success', 'Order status updated');
    }

    public function destroy(Order $order) {
        $order->delete();
        return back()->with('success', 'Order deleted');
    }
}
