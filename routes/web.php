<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/**
 * Admin Panel
 */

 // Verified Email
Route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth', 'verified');


// Category
Route::get('/view_category', [AdminController::class,'view_category']);
Route::post('/add_category', [AdminController::class,'add_category']);
Route::get('/delete_category/{id}', [AdminController::class,'delete_category']);

// Product
Route::get('/view_product', [AdminController::class,'view_product']);
Route::post('/add_product', [AdminController::class,'add_product']);
Route::get('/show_product', [AdminController::class,'show_product']);
Route::get('/delete_product/{id}', [AdminController::class,'delete_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::put('/update_product/{id}', [AdminController::class, 'edit_product']);

// Orders in admin panel
Route::get('/view_orders', [AdminController::class,'view_orders']);
// Status Delivered
Route::get('/delivered/{id}', [AdminController::class,'delivered']);

// Print PDF
Route::get('/print_pdf/{id}', [AdminController::class,'print_pdf']);

// Send Email
Route::get('/send_email/{id}', [AdminController::class,'send_email']);
Route::post('/send_user_email/{id}', [AdminController::class,'send_user_email']);

// Search Product
Route::get('/search', [AdminController::class,'searchdata']);

// View Contact Message
Route::get('/view_contact', [AdminController::class, 'view_contact']);
// Delete Contact Message
Route::get('/delete_contact_us/{id}', [AdminController::class, 'delete_contact_us']);


/**
 * Front
 */
// Product details
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

// Add to cart, Show cart
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

// For order
Route::get('/cash_order', [HomeController::class, 'cash_order']);

//STRIPE PAYMENT SYSTEM
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);
Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

// Show Order
Route::get('show_order', [HomeController::class, 'show_order']);
//Remove order
Route::get('cancel_order/{id}', [HomeController::class, 'cancel_order']);

// Comment
Route::post('/add_comment', [HomeController::class, 'add_comment']);
// Reply comment
Route::post('add_reply', [HomeController::class, 'add_reply']);

// Contact As
Route::get('/contact_us', [HomeController::class, 'contact_us']);
Route::post('/contact_us', [HomeController::class, 'send_message'])->name('contact.store');

// Map
Route::post('/store', [HomeController::class, 'store']);

//Enter Your Location
Route::get('/location', [HomeController::class, 'location']);
Route::post('/location', [HomeController::class, 'location_store']);

// Search Product
Route::get('/product_search', [HomeController::class, 'product_search']);

// Products page, all products
Route::get('/products', [HomeController::class, 'products']);

// Search product for product table
Route::get('/search_product', [HomeController::class, 'search_product']);
