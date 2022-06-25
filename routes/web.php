<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExperimentController;
use App\Http\Controllers\PricedItemController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserSettingController;
use App\Models\Client;
use App\Models\Quote;
use App\Models\User;
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

/*
    USER
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
/*
    USER
*/
Route::get('/user/settings', [UserSettingController::class, 'index'])->middleware(['auth'])->name('settings');
Route::patch('/user/settings', [UserSettingController::class, 'update'])->middleware(['auth']);

/*
    CLIENTS
*/
Route::get('/clients', [ClientController::class, 'index'])->middleware(['auth'])->name('clients');
Route::post('/clients', [ClientController::class, 'store'])->middleware(['auth']);
Route::get('/clients/create', [ClientController::class, 'create'])->middleware(['auth']);
Route::get('/clients/{client}', [ClientController::class, 'show'])->middleware(['can:view-client,client'])->name('clients')->where('client', '[0-9]+');
Route::patch('/clients/{client}', [ClientController::class, 'update'])->middleware(['can:edit-client,client'])->name('clients')->where('client', '[0-9]+');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->middleware(['can:edit-client,client'])->name('clients')->where('client', '[0-9]+');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->middleware(['can:edit-client,client'])->name('clients')->where('client', '[0-9]+');

/*
    QUOTES
*/

Route::get('/quotes', [QuoteController::class, 'index'])->middleware(['auth'])->name('quotes');
Route::post('/quotes', [QuoteController::class, 'store'])->middleware(['auth']);
Route::get('/quotes/create', [QuoteController::class, 'create'])->middleware(['auth']);
Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->middleware(['can:view-quote,quote'])->name('quotes')->where('quote', '[0-9]+');
Route::patch('/quotes/{quote}', [QuoteController::class, 'update'])->middleware(['can:edit-quote,quote'])->name('quotes')->where('quote', '[0-9]+');
Route::get('/quotes/{quote}/edit', [QuoteController::class, 'edit'])->middleware(['can:edit-quote,quote'])->name('quotes')->where('quote', '[0-9]+');
Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->middleware(['can:edit-quote,quote'])->name('quotes')->where('quote', '[0-9]+');
/*
    PRICED ITEMS
*/
//TODO
Route::get('/priceditems', [PricedItemController::class, 'index'])->middleware(['auth'])->name('priceditems');
Route::post('/priceditems', [PricedItemController::class, 'store'])->middleware(['auth']);
Route::get('/priceditems/create', [PricedItemController::class, 'create'])->middleware(['auth']);
Route::get('/priceditems/{pricedItem}', [PricedItemController::class, 'show'])->middleware(['can:view-item,pricedItem'])->name('priceditems')->where('pricedItem', '[0-9]+');
Route::patch('/priceditems/{pricedItem}', [PricedItemController::class, 'update'])->middleware(['can:edit-item,pricedItem'])->name('priceditems')->where('pricedItem', '[0-9]+');
Route::get('/priceditems/{pricedItem}/edit', [PricedItemController::class, 'edit'])->middleware(['can:edit-item,pricedItem'])->name('priceditems')->where('pricedItem', '[0-9]+');
Route::delete('/priceditems/{pricedItem}', [PricedItemController::class, 'destroy'])->middleware(['can:edit-item,pricedItem'])->name('priceditems')->where('pricedItem', '[0-9]+');


require __DIR__ . '/auth.php';
