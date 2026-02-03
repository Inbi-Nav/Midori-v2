<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {

        return response()-> json(Order::with('user')->get());
    }

    public function myOrders(Request $request) {

         return response()->json (
            $request->user()->orders()->with('items')->get()
         );
    }

    public function store(Request $request) {

        $orders = Order::create([
            'user_id' => $request->user()->id,
            'total_amount' => 0,
            'status' => 'pending',
        ]);

        return response()-> json ($orders, 201);
    }


    public function updateStatus(Request $request, $id) {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }
        $order->status = $request->status;
        $order->save();

        return response()->json($order);
    }

    public function destroy($id) {
        $orders = Order::find($id);
        if ($orders) {
            $orders->delete();
            return response()-> json (['message' => 'pedido eliminado']);
        } else {
            return response()-> json (['message' => 'pedido no encontrado'], 404);
        }
    }

}
