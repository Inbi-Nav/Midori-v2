<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $orders= Order::all();
        return response()-> json($orders);
    }

    public function show($id) {
        $orders= Order::find($id);
        if ($orders) {
            return response()->json ($orders);
        } else {
            return response()->json (['message' => 'pedido no encontrado'], 404);
        }
    }

    public function store(Request $request) {
        $orders = Order::create([
            'user_id' => $request->user_id,
            'total_amount' => $request->total_amount,
            'status' => $request->status
        ]);
        return response()-> json ($orders, 201);
    }


    public function update (Request $request, $id) {
        $orders = Order::find($id);
        if ($orders) {
            $orders ->update($request->all());
            return response()-> json ($orders);
        } else {
            return response()->json (['message'=> 'Pedido no encontrado'], 404);
        }
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
