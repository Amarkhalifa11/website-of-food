<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;




use App\Http\Controllers\backendController;
Route::get('/logout', [backendController::class, 'logout'])->name('logout');




use App\Http\Controllers\ProductController;
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/single/{id}', [ProductController::class, 'single'])->name('single');
Route::get('/products/{category}', [ProductController::class, 'category'])->name('category');

Route::get('/all_products', [ProductController::class, 'all_products'])->name('all_products');
Route::get('/add_products', [ProductController::class, 'create'])->name('add_products');
Route::post('/store', [ProductController::class, 'store'])->name('store');


Route::get('/products/edit_products/{id}', [ProductController::class, 'edit_products'])->name('products.edit_products');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/products/single', function () {
    return redirect('/');
});



use App\Http\Controllers\OrderTableController;
Route::get('/all_orders_table', [OrderTableController::class, 'index'])->name('all_orders_table');
Route::get('/all_orders_table/destroy/{id}', [OrderTableController::class, 'destroy'])->name('all_orders_table.destroy');



use App\Http\Controllers\OrdersItemController;
Route::get('/all_orders_items', [OrdersItemController::class, 'index'])->name('all_orders_items');
Route::get('/all_orders_items/it/{id}', [OrdersItemController::class, 'delete'])->name('all_orders_items.it');






use App\Http\Controllers\CartController;
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/remove', [CartController::class, 'remove'])->name('remove');
Route::post('/edit', [CartController::class, 'edit'])->name('edit');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/place_order', [CartController::class, 'place_order'])->name('place_order');




Route::get('/edit', function () {
    return redirect('/');
});

Route::get('/add_to_cart', function () {
    return redirect('/');
});

Route::get('/remove', function () {
    return redirect('/');
});





use App\Http\Controllers\PaymentController;
Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('/verify/{transaction_id}', [PaymentController::class, 'verify'])->name('verify');
Route::get('/complete', [PaymentController::class, 'complete'])->name('complete');
Route::get('/thank_you', [PaymentController::class, 'thank_you'])->name('thank_you');

Route::get('/all_payment', [PaymentController::class, 'index'])->name('all_payment');
Route::get('/all_payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('all_payment.destroy');


Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/single', function () {
    return view('single');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('/users', function () {
        $users = User::all();
        return view('admin.user.users' , compact('users'));
    })->name('users');
});
