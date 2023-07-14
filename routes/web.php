<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect', [HomeController::class,'redirect']);
Route::get('/', [HomeController::class,'index']);
Route::get('/category', [CategoryController::class,'index']);
Route::get('/category/create', [CategoryController::class,'create']);
Route::post('/category', [CategoryController::class,'store']);
Route::get('/category/{id}/edit', [CategoryController::class,'edit']);
Route::post('/category/{id}', [CategoryController::class,'update']);
Route::get('/category/{id}', [CategoryController::class,'destroy']);

Route::resource('/products', ProductController::class);

// GET|HEAD        products ............................ products.index › ProductController@index
// POST            products ............................ products.store › ProductController@store
// GET|HEAD        products/create ................... products.create › ProductController@create
// GET|HEAD        products/{product} .................... products.show › ProductController@show
// PUT|PATCH       products/{product} ................ products.update › ProductController@update
// DELETE          products/{product} .............. products.destroy › ProductController@destroy
// GET|HEAD        products/{product}/edit ............... products.edit › ProductController@edit
