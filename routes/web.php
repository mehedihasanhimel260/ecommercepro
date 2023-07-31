<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendProductController;
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
Route::get('/singleproduct/{id}', [FrontendProductController::class,'index']);

Route::get('/carts', [CartController::class, 'index']);
Route::get('/carts/create', [CartController::class, 'create']);
Route::post('/carts', [CartController::class, 'store']);
Route::get('/carts/{id}', [CartController::class, 'show']);
Route::get('/carts/{id}/edit', [CartController::class, 'edit']);
Route::put('/carts/{id}', [CartController::class, 'update']);
Route::delete('/carts/{id}', [CartController::class, 'destroy']);


// GET|HEAD        products ............................ products.index › ProductController@index   	{{ route('products.create') }}
// POST            products ............................ products.store › ProductController@store	{{ route('products.store') }}
// GET|HEAD        products/create ................... products.create › ProductController@create	{{ route('products.update', $product) }}
// GET|HEAD        products/{product} .................... products.show › ProductController@show
// PUT|PATCH       products/{product} ................ products.update › ProductController@update  @method('PUT')
// DELETE          products/{product} .............. products.destroy › ProductController@destroy
// GET|HEAD        products/{product}/edit ............... products.edit › ProductController@edit


// <td>
// <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View</a>
// <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Edit</a>
// <form action="{{ route('products.destroy ', $product) }}" method="POST" class="d-inline">
//     @csrf
//     @method('DELETE')
//     <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
// </form>
// </td>
