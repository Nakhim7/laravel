<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StoreController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/category', [CategoryController::class, 'index'])->name("category.list");

Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");

Route::post('/category', [CategoryController::class, 'store'])->name("category.store");

Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');

Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');

Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");

//Route::resource('/product',ProductController::class);

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');

//frontend Route
Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');

Route::get('/list', [FrontendController::class, 'list']);
Route::get('/show/{id}', [FrontendController::class, 'show']);

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/detail', [UserController::class, 'show'])->name('user.show');

Route::get('/frontend/{category?}', [FrontendController::class, 'getByCategory']);
Route::get('/search', [FrontendController::class, 'getBySearch']);

// login and register
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Change and update
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('form.password');
Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change.password');

// update profile
Route::get('/update-profile/{user}',  [UpdateProfileController::class, 'editProfile'])->name('profile.edit');
Route::patch('/update-profile/{user}',  [UpdateProfileController::class, 'updateProfile'])->name('profile.update');

//reset Password 
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//Cart
Route::get('/home/cart', [StoreController::class, 'index']);
Route::get('/cart/', [StoreController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [StoreController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [StoreController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [StoreController::class, 'remove'])->name('remove.from.cart');
