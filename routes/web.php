<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\VouterController;

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
    return view('welcome');
})->name('welcome');

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::post('/register', [VouterController::class, 'store'])->name('vouter.store');

Route::get('user/index', [VouterController::class, 'index'])->name('user.index');

Route::get('logout', [VouterController::class, 'logout'])->name('logout');

Route::post('user/login', [VouterController::class, 'login'])->name('user.login');