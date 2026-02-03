<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Payment;
use App\Models\user;
use App\Models\Order;


class AdminController extends Controller
{
    public function stats() {
         return response()->json([
            'users_total' => User::count(),
            'providers_total' => User::where('role', 'provider')->count(),
            'products_total' => Product::count(),
            'orders_total' => Order::count(),
            'payments_total' => Payment::count(),
            'total_revenue' => Payment::sum('amount'),
       ]);
    }
}
