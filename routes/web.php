<?php

use App\Http\Livewire\Auth\Index as AuthIndex;
use App\Http\Livewire\Task\Base as TaskBase;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Cart\Index as CartIndex;
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
*/

Route::get('/', function () {
    return view('index');
})->name('home')->middleware('auth');


Route::get('/tasks', TaskBase::class)->name('tasks');

Route::get('/products', ProductIndex::class)->name('products.index');
Route::get('/products/create', ProductCreate::class)->name('products.create');

Route::get('/cart', CartIndex::class)->name('cart.index');




Route::get('/login', AuthIndex::class)->name('login');

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');




Route::get('/test', function () {
    dd( \Cart::getContent() );

    // \Cart::clear();
});
