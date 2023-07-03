<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// This is the main page route that will show the register form
Route::get('/', function () {
    return view('forms.register');
});




// This route is for registering a user
Route::get('/register-form', [UserController::class, 'showRegistrationForm'])->name('registerform');
Route::post('/register', [UserController::class, 'register'])->name('register');






// This route is for logging in a user
Route::get('/login-form', [UserController::class, 'showLoginForm'])->name('loginform');
Route::post('/login', [UserController::class, 'login'])->name('login');









// This route is for the navbar
Route::post('/navbar', [UserController::class, 'showNavbar'])->name('navbar');









// These are the Yajra DataTable CRUD routes
Route::resource('products-ajax-crud', CrudController::class);
Route::get('products-ajax-crud/{id}', [CrudController::class, 'show'])->name('products-ajax-crud.showuser');

Route::get('product', [CrudController::class, 'index'])->name('products.index');
Route::post('product', [CrudController::class, 'store'])->name('products.store');
Route::get('product/{id}/edit', [CrudController::class, 'edit'])->name('products.edit');
Route::delete('product/{id}', [CrudController::class, 'destroy'])->name('products.destroy');










// This route is for fetching user data by country using Canvas.js Graph
Route::get('products-ajax-crud/usersByCountry', [CrudController::class, 'usersByCountryGraph'])->name('products-ajax-crud.usersByCountry');
