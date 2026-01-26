<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CheckoutController;
use App\Livewire\CartPage;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminUserController;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('welcome');
});

Route::get('/shop', [ShopController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/products/{product}', [ShopController::class, 'show'])
    ->middleware(['auth'])
    ->name('shop.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cart', CartPage::class)->name('cart');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
    Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
});


Route::middleware('auth')->get('/my-orders', function () {
    $orders = auth()->user()
        ->orders()
        ->latest()
        ->get();

    return view('admin.orders.my-orders', compact('orders'));
})->name('orders.mine');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');

        Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.status');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');
        
        Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])
            ->name('orders.delete');
});

Route::middleware('auth')->patch('/orders/{order}/cancel', function (\App\Models\Order $order) {

    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    if (!in_array($order->status, ['paid', 'pending'])) {
        return back()->with('error', 'This order cannot be cancelled.');
    }

    $order->update([
        'status' => 'cancelled'
    ]);

    return back()->with('success', 'Order cancelled successfully.');
})->name('orders.cancel');
