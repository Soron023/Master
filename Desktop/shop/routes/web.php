<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EbookProductController;
use App\Http\Controllers\EbookFrontendController;
use App\Http\Controllers\EbookShopController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactUsFormController;

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


// return view

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/chart', function () {
    return view('admin.chart');
});
Route::get('/categoryexample', function () {
    return view('category.index');
});

// return string
Route::get('/makara', function () {
    return 'welcome to makara';
});

// return action controller
Route::get('/TestController', [TestController::class, 'index']);

// Route::direct('/test3', 'test1');

Route::get('/welcome1', function () {
     return view('welcome1');
 });


// with parameters name to views - welcome2
Route::view('/welcome2', '/welcome2', ['name' => 'Meng Makara', 'age' => '32']);

Route::get('/user/{id}', function ($id) {
    return 'user ' . $id;
});

Route::get('/posts/{postId}/comments/{commentId}', function ($postId, $commentId){
    return 'posts ' . $postId . ' comments ' . $commentId; 
});

// Optional parameters : show when you type name on url

Route::get('/myuser/{name?}', function ($name = null){
    return $name;
});

Route::get('/myuser1/{name?}', function ($name = 'John'){
    return $name;
});

// Regular Expression Constrains

Route::get('/myuser3/{name}', function ($name){
    return "Your name $name";
})->where ('name','[A-Za-z]+');

Route::get('/myuser4/{ID}', function ($ID){
    return "Your id is $ID";
})->where ('ID','[0-9]+');

Route::get('/myuser5/{ID}/{name}', function ($ID, $name){
    return "Your id is $ID  , and you name is $name ";
})->where (['ID' => '[0-9]+', 'name' => '[A-Za-z ]+']);

// Name route : for shortcut name route

Route::get('/user6/profile', function(){
    $url = route('profile');
    return "user profile : " . $url;
})->name('profile');



Route::match(['get', 'post'], '/test1', function () {
    return "TEST1: match get and post";
});

Route::any('/test2', function () {
    return "TEST2: any get and post";
});

Route::redirect('/test3','/test1');

// return action incontroller: CategoryController 
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category1', [CategoryController::class, 'test1']);
Route::get('/category2', [CategoryController::class, 'test2']);
Route::get('/category3', [CategoryController::class, 'test3']);

Route::get('/product1', [ProductController::class, 'test1']);


// route for create 
Route::get('/category/create', [CategoryController::class, 'create']);
// rpute for save
Route::post('/category', [CategoryController::class, 'store']);
// route for find editing field
Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');
// route for update
Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');
// route for delete
Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');

// Route for Post
Route::resource('/post', PostController::class);
// Route for Post


// frotnend

//old route
// Route::get('/','FrontendController@index'); 
//new route 
// Route::get('/',[FrontendController::class,'index']);

Route::get('/', [FrontendController::class, 'index']);
Route::get('/show/{post}', [FrontendController::class, 'show']);
Route::get('/frontend/category/{category}', [FrontendController::class, 'getByCategory']);
Route::get('/frontend/search/', [FrontendController::class, 'getBySearch']);
// frotnend


//contact form
Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');
//contact form


// login and register
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// End login and register

// change password
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('form.password');
Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change.password');
// End change password


// update profile
Route::get('/update-profile/{user}',  [UpdateProfileController::class, 'editProfile'])->name('profile.edit');
Route::patch('/update-profile/{user}',  [UpdateProfileController::class, 'updateProfile'])->name('profile.update');
// End update profile


// Product to cart
Route::get('/shop', [ProductController::class, 'index']);  
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
// End Product to cart
// check out
Route::get('/checkout', [ProductController::class, 'checkout'])->name('cart.checkout');
// check out


// EbookProduct detail
Route::resource('/ebook', EbookProductController::class);
Route::get('/ebook-backend', [EbookProductController::class, 'show']);
// EbookProduct for frontend
Route::get('/ebook-frontend', [EbookFrontendController::class, 'index']);
Route::get('/ebook-show/{post}', [EbookFrontendController::class, 'show']);
Route::get('/ebook-frontend/category/{category}', [EbookFrontendController::class, 'getByCategory']);
Route::get('/ebook-frontend/search/', [EbookFrontendController::class, 'getBySearch']);
// EbookProduct add to cart
Route::get('/ebook-shop', [EbookShopController::class, 'index']);
Route::get('/ebook-cart', [EbookShopController::class, 'ebookCart'])->name('ebook.cart');
Route::get('/ebook-add-to-cart/{id}', [EbookShopController::class, 'ebookAddToCart'])->name('ebook.add.to.cart');
Route::get('/ebook-checkout', [EbookShopController::class, 'ebookCheckout'])->name('ebook.cart.checkout');
Route::patch('/ebook-update-cart', [EbookShopController::class, 'ebookUpdate'])->name('ebook.update.cart');
Route::delete('/ebook-remove-from-cart', [EbookShopController::class, 'ebookRemove'])->name('ebook.remove.from.cart');




// Route::get('/ebook1', [EbookProductController::class, 'index']);  
// Route::get('/backend', [EbookProductController::class, 'backend']);  
// Route::get('/ebookcart', [EbookProductController::class, 'ebookcart'])->name('cart');
// Route::get('/ebookadd-to-cart/{id}', [EbookProductController::class, 'ebookaddToCart'])->name('add.to.cart');
// Route::patch('/ebook-update-cart', [EbookProductController::class, 'ebookupdate'])->name('update.cart');
// Route::delete('/ebook-remove-from-cart', [EbookProductController::class, 'ebookremove'])->name('remove.from.cart');
//End EbookProduct to cart
//check out EbookProduct
Route::get('/ebookcheckout', [EbookProductController::class, 'checkout'])->name('cart.checkout');
// check out EbookProduct



// //Auth costom from note

// Route::group(['namespace' => 'App\Http\Controllers'], function()
// {   
//     /**
//      * Home Routes
//      */
//     Route::get('/', 'HomeController@index')->name('home.index');

//     Route::group(['middleware' => ['guest']], function() {
//         /**
//          * Register Routes
//          */
//         Route::get('/register', 'RegisterController@show')->name('register.show');
//         Route::post('/register', 'RegisterController@register')->name('register.perform');

//         /**
//          * Login Routes
//          */
//         Route::get('/login', 'LoginController@show')->name('login.show');
//         Route::post('/login', 'LoginController@login')->name('login.perform');

//     });

//     Route::group(['middleware' => ['auth', 'permission']], function() {
//         /**
//          * Logout Routes
//          */
//         Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

//         /**
//          * User Routes
//          */
//         Route::group(['prefix' => 'users'], function() {
//             Route::get('/', 'UsersController@index')->name('users.index');
//             Route::get('/create', 'UsersController@create')->name('users.create');
//             Route::post('/create', 'UsersController@store')->name('users.store');
//             Route::get('/{user}/show', 'UsersController@show')->name('users.show');
//             Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
//             Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
//             Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
//         });

//         /**
//          * User Routes
//          */
//         Route::group(['prefix' => 'posts'], function() {
//             Route::get('/', 'PostsController@index')->name('posts.index');
//             Route::get('/create', 'PostsController@create')->name('posts.create');
//             Route::post('/create', 'PostsController@store')->name('posts.store');
//             Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
//             Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
//             Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
//             Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
//         });

//         Route::resource('roles', RolesController::class);
//         Route::resource('permissions', PermissionsController::class);
//     });
// });


// //Auth costom