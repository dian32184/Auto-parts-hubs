<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
Route::get('/category/{slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/shop/category/{type}/{parentSlug}/{slug}', [ShopController::class, 'subcategory'])->name('shop.subcategory');
Route::get('/shop/{slug}', [ShopController::class,'product_details'])->name('shop.product.details');

Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
Route::put('cart/increase-quantity/{rowId}',[CartController::class,'increase_cart_quantity'])->name('cart.qty.increase');
Route::put('cart/decrease-quantity/{rowId}',[CartController::class,'decrease_cart_quantity'])->name('cart.qty.decrease');
Route::delete('cart/remove/{rowId}', [CartController::class,'remove_item'])->name('cart.item.remove'); 
Route::delete('cart/clear', [CartController::class,'empty_cart'])->name('cart.empty');

Route::post('/wishlist/add',[WishlistController::class,'add_to_wishlist'])->name('wishlist.add');
Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist.index');
Route::delete('/wishlist/item/remove/{rowId}',[WishlistController::class,'remove_item'])->name('wishlist.item.remove');
Route::delete('/wishlist/clear',[WishlistController::class,'empty_wishlist'])->name('wishlist.item.clear');
Route::post('/wishlist/move-to-cart/{rowId}',[WishlistController::class,'move_to_cart'])->name('wishlist.move.to.cart');

Route::get('/checkout', [CartController::class,'checkout'])->name('cart.checkout');

// Order routes
Route::post('/place-order', [App\Http\Controllers\OrderController::class, 'placeOrder'])->name('place.order');
Route::get('/order/confirmation/{id}', [
    'uses' => 'App\Http\Controllers\OrderController@confirmation',
    'as' => 'order.confirmation'
]);


Route::get('/contact', function () {
    return view('contact');
})->name('contact.index');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/user/orders', [App\Http\Controllers\OrderController::class, 'userOrders'])->name('user.orders');
Route::get('/user/order/{id}', [App\Http\Controllers\OrderController::class, 'orderDetails'])->name('user.order.details');
Route::post('/user/order/{id}/cancel', [App\Http\Controllers\OrderController::class, 'cancelOrder'])->name('user.order.cancel');

Route::middleware(['auth'])->group(function(){
    Route::get('/account-dashboard', [Usercontroller::class, 'index'])->name('user.index');
});
Route::middleware(['auth',AuthAdmin::class])->group(function(){
    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // Slider Management Routes
    Route::get('/admin/sliders', [App\Http\Controllers\Admin\SliderController::class, 'index'])->name('admin.sliders.index');
    Route::get('/admin/sliders/create', [App\Http\Controllers\Admin\SliderController::class, 'create'])->name('admin.sliders.create');
    Route::post('/admin/sliders', [App\Http\Controllers\Admin\SliderController::class, 'store'])->name('admin.sliders.store');
    Route::get('/admin/sliders/{slider}/edit', [App\Http\Controllers\Admin\SliderController::class, 'edit'])->name('admin.sliders.edit');
    Route::put('/admin/sliders/{slider}', [App\Http\Controllers\Admin\SliderController::class, 'update'])->name('admin.sliders.update');
    Route::delete('/admin/sliders/{slider}', [App\Http\Controllers\Admin\SliderController::class, 'destroy'])->name('admin.sliders.destroy');
    Route::post('/admin/sliders/update-order', [App\Http\Controllers\Admin\SliderController::class, 'updateOrder'])->name('admin.sliders.update-order');
    
    // Admin Orders Routes
    Route::get('/admin/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/admin/orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    
    // Add transactions route
    Route::get('/admin/transactions', [PaymentController::class, 'transactions'])->name('admin.transactions');
    
    Route::get('/admin/brands',[AdminController::class,'brands'])->name('admin.brands');
    Route::get('/admin/brand/add', [AdminController::class,'add_brand'])->name('admin.brand.add');
    Route::post('/admin/brand/store',[AdminController::class,'brand_store'])->name('admin.brand.store');
    Route::get('/admin/brand/edit/{id}',[AdminController::class,'edit_brand'])->name('admin.brand.edit');
    Route::put('/admin/brand/update',[AdminController::class,'brand_update'])->name('admin.brand.update');
    Route::delete('/admin/brand/{id}/delete',[AdminController::class,'delete_brand'])->name('admin.brand.delete');

    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/category/add', [AdminController::class, 'add_category'])->name('admin.category.add');
    Route::post('/admin/category/store', [AdminController::class, 'add_category_store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [AdminController::class, 'edit_category'])->name('admin.category.edit');
    Route::post('/admin/category/update', [AdminController::class, 'update_category'])->name('admin.category.update');
    Route::delete('/admin/category/delete/{id}', [AdminController::class, 'delete_category'])->name('admin.category.delete');
    Route::get('/admin/categories/by-type/{type}', [AdminController::class, 'getCategoriesByType'])->name('admin.categories.by-type');

    Route::get('/admin/products',[AdminController::class,'products'])->name('admin.products');
    Route::get('/admin/product/add',[AdminController::class,'add_product'])->name('admin.product.add');
    Route::post('/admin/product/store',[AdminController::class,'product_store'])->name('admin.product.store');
    Route::get('/admin/product/{id}/edit', [AdminController::class,'edit_product'])->name('admin.product.edit');
    Route::put('/admin/product/update',[AdminController::class,'update_product'])->name('admin.product.update');
    Route::delete('/admin/product/{id}/delete',[AdminController::class,'delete_product'])->name('admin.product.delete');

    Route::get('/inventory', [InventoryController::class, 'index'])->name('admin.inventory.index');
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('admin.inventory.create');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('admin.inventory.store');
    Route::get('/inventory/{id}', [InventoryController::class, 'show'])->name('admin.inventory.show');
    Route::get('/{id}/edit', [InventoryController::class, 'edit'])->name('admin.inventory.edit');
    Route::put('/{id}', [InventoryController::class, 'update'])->name('admin.inventory.update');
    Route::delete('/{id}', [InventoryController::class, 'destroy'])->name('admin.inventory.destroy');

    Route::get('/inventory/stock-in/form', [InventoryController::class, 'stockInForm'])->name('admin.inventory.stock-in.form');
    Route::post('/inventory/stock-in', [InventoryController::class, 'stockIn'])->name('admin.inventory.stock-in');
    Route::get('/inventory/stock-out/form', [InventoryController::class, 'stockOutForm'])->name('admin.inventory.stock-out.form');
    Route::post('/inventory/stock-out', [InventoryController::class, 'stockOut'])->name('admin.inventory.stock-out');

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
    Route::get('/supplier/add', [SupplierController::class, 'create'])->name('supplier.add');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.delete');
});

// Checkout and Payment Routes
Route::middleware(['auth'])->group(function() {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');
    
    // Payment Routes
    Route::get('/payment/gcash/{order}', [PaymentController::class, 'gcash'])->name('payment.gcash');
    Route::get('/payment/paymaya/{order}', [PaymentController::class, 'paymaya'])->name('payment.paymaya');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
    
    // Order Confirmation
    Route::get('/order/confirmation/{order}', [CheckoutController::class, 'confirmation'])->name('order.confirmation');
});

// User Order Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [App\Http\Controllers\User\OrderController::class, 'index'])->name('user.orders');
    Route::get('/orders/{order}', [App\Http\Controllers\User\OrderController::class, 'show'])->name('user.order.details');
    Route::post('/orders/{order}/cancel', [App\Http\Controllers\User\OrderController::class, 'cancel'])->name('user.order.cancel');
});