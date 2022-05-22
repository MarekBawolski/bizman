<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExperimentController;
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
    CLIENTS
*/
Route::get('/clients', [ClientController::class, 'getClients'])->middleware(['auth'])->name('clients');

Route::get('/clients/{client}/view', [ClientController::class, 'viewClient'])->middleware(['can:view-client,client'])->name('clients')->where('client', '[0-9]+');

/*
    QUOTES
*/
//TODO
/*
    PRICED ITEMS
*/
//TODO
Route::get('experiment', [ExperimentController::class, 'index'])
    ->name('experiment');

require __DIR__ . '/auth.php';
