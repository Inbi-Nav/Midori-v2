<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index() {
        $payments = Payment::all();
        return response() -> json ($payments);
    }

    public function show($id) {
        $payments = Payment::find($id); 
        if ($payments) {
            return response() -> json ($payments);
        } else {
            return response() -> json (['message' => 'Pago no encontrado'], 404);
        }
    }

    public function store(Request $request) {
        $payments = Payment::create([
            'order_id' => $request ->order_id, 
            'amount' => $request -> amount,
            'payment_method' => $request -> payment_method,
            'status' => $request -> status
        ]);
        return response()-> json ($payments, 201);
    }

    public function update (Request $request, $id) {
        $payments =  Payment::find($id);
        if ($payments) {
            $payments -> update($request -> all());
            return response()-> json ($payments);
        } else {
            return response() -> json (['message' => 'Pago no encontrado']);
        }
    }

    public function destroy ($id) {
        $payments = Payment::find($id);
        if ($payments) {
        $payments-> delete();
        return response() -> json (['message' => 'Pago eliminado']);
        } else {
        return response() -> json (['message' => 'Pago no encontrado'], 404);
        }
    }
}
