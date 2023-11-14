<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('aboutus', [App\Http\Controllers\Frontend\FrontendController::class, 'aboutus']);

Route::get('contactus', [App\Http\Controllers\Frontend\ContactController::class, 'contactus']);
Route::post('send-message', [App\Http\Controllers\Frontend\ContactController::class, 'ContactMailable']);

/* Profile */
Route::get('/my_profile', [App\Http\Controllers\Frontend\UserController::class, 'myprofile']);
Route::post('/profile_update', [App\Http\Controllers\Frontend\UserController::class, 'profileupdate']);
Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'changepassword']);
Route::post('/change_password', [App\Http\Controllers\Frontend\UserController::class, 'newpassword']);

/* Order view for customer */
Route::get('/my_order', [App\Http\Controllers\Frontend\UserController::class, 'order']);
Route::get('view-order/{id}', [App\Http\Controllers\Frontend\UserController::class, 'orderview']);


/* front page productview */
Route::get('product/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost']);
Route::get('product/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);

/* Cart  model table*/
Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addtocart']);
Route::get('/cart',[App\Http\Controllers\Frontend\CartController::class, 'viewcart']);
Route::delete('/delete-from-cart',[App\Http\Controllers\Frontend\CartController::class, 'deletefromcart']);
Route::post('/update-to-cart',[App\Http\Controllers\Frontend\CartController::class, 'updatetocart']);
Route::get('/clear-cart',[App\Http\Controllers\Frontend\CartController::class, 'clearcart']);
Route::get('/load-cart-data',[App\Http\Controllers\Frontend\CartController::class, 'cartcount']);

/* Checkout page */
Route::get('checkout',[App\Http\Controllers\Frontend\CheckoutController::class, 'checkout']);
Route::post('placeorder',[App\Http\Controllers\Frontend\CheckoutController::class, 'store']);
Route::get('thank_you',[App\Http\Controllers\Frontend\CheckoutController::class, 'thankyou']);

//wishlist part
Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class, 'view']);
Route::post('add-to-wishlist',[App\Http\Controllers\Frontend\WishlistController::class, 'addwishlist']);
Route::post('delete-from-wishlist',[App\Http\Controllers\Frontend\WishlistController::class, 'delete']);
Route::get('/load-wishlist-data',[App\Http\Controllers\Frontend\WishlistController::class, 'wishlistcount']);
Route::get('/clear-wishlist',[App\Http\Controllers\Frontend\WishlistController::class, 'clearwishlist']);

//Rating
Route::post('add_rating',[App\Http\Controllers\Frontend\RatingController::class, 'rate']);

//review 
 Route::get('/add-review/{post_slug}/userreview',[App\Http\Controllers\Frontend\ReviewController::class, 'review']);
 Route::post('add_reviews',[App\Http\Controllers\Frontend\ReviewController::class, 'create']);
 Route::get('edit-review/{post_slug}/userreview',[App\Http\Controllers\Frontend\ReviewController::class, 'edit']);
 Route::put('update_reviews', [App\Http\Controllers\Frontend\ReviewController::class, 'update']);

//search
Route::get('/searching', [App\Http\Controllers\Frontend\FrontendController::class, 'searchproduct']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category1', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add-post1', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('edit-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
    Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);
//users details in admin panel
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
//Order management of admin
    Route::get('orders', [App\Http\Controllers\Admin\UserController::class, 'order']);
    Route::get('view-order/{order_id}', [App\Http\Controllers\Admin\UserController::class, 'view']);
    Route::put('update-order/{order_id}', [App\Http\Controllers\Admin\UserController::class, 'statusupdate']);
    Route::get('order-history', [App\Http\Controllers\Admin\UserController::class, 'orderhistory']);
//invoice for order
    Route::get('/invoice/{order_id}', [App\Http\Controllers\Admin\UserController::class, 'viewInvoice']);
    Route::get('/invoice/{order_id}/generate', [App\Http\Controllers\Admin\UserController::class, 'generateInvoice']);
    Route::get('/invoice/{order_id}/mail', [App\Http\Controllers\Admin\UserController::class, 'mailinvoice']);


    //slider part
    Route::get('sliders', [App\Http\Controllers\Admin\SliderController::class, 'slider']);
    Route::get('sliders/create', [App\Http\Controllers\Admin\SliderController::class, 'create']);
    Route::get('sliders/{slider}/edit', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
    Route::post('add-slider', [App\Http\Controllers\Admin\SliderController::class, 'store']);
    Route::get('sliders/{slider}/delete', [App\Http\Controllers\Admin\SliderController::class, 'destroy']);
    Route::put('slider-update/{slider_id}', [App\Http\Controllers\Admin\SliderController::class, 'update']);
    //site setting
    Route::get('sitesetting', [App\Http\Controllers\Admin\SettingController::class, 'settings']);
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'store']);

    //About us
    Route::get('aboutus', [App\Http\Controllers\Admin\SettingController::class, 'aboutus']);
    Route::get('about_add', [App\Http\Controllers\Admin\SettingController::class, 'about_add']);
    
    Route::post('abouts', [App\Http\Controllers\Admin\SettingController::class, 'abouts_save']);
    Route::get('edit-aboutus/{about_id}', [App\Http\Controllers\Admin\SettingController::class, 'edit']);
    Route::put('update-aboutus/{about_id}', [App\Http\Controllers\Admin\SettingController::class, 'update']);
    Route::get('delete-aboutus/{about_id}', [App\Http\Controllers\Admin\SettingController::class, 'destroy']);






});