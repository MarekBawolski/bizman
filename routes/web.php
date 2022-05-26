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
//TODO
/*
    PRICED ITEMS
*/
//TODO
Route::get('experiment', [ExperimentController::class, 'index'])
    ->name('experiment');

require __DIR__ . '/auth.php';
