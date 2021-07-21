<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\VouterController;
use App\Http\Controllers\survey\SurveyController;
use App\Http\Controllers\Projets\ProjetsController;

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

Route::get('user/edit/{id}', [VouterController::class, 'edit'])->name('user.edit');

Route::post('user/update/{id}', [VouterController::class, 'update'])->name('user.update');

Route::delete('/user/delete/{id}', [App\Http\Controllers\VouterController::class, "destroy"])->name("user.delete");

Route::get("survey/index", [App\Http\Controllers\survey\SurveyController::class, 'index'])->name('survey.index');
Route::get("survey/create/{id}", [App\Http\Controllers\survey\SurveyController::class, 'create'])->name('survey.create');
Route::post("survey/store", [App\Http\Controllers\survey\SurveyController::class, 'store'])->name('survey.store');

Route::get("projets/index", [App\Http\Controllers\projets\ProjetsController::class, 'index'])->name('projets.index');
Route::get("projets/detail/{id}", [App\Http\Controllers\projets\ProjetsController::class, 'detail'])->name('projets.detail');
Route::get("projets/create", [App\Http\Controllers\projets\ProjetsController::class, 'create'])->name('projets.create');
Route::post("projets/store", [App\Http\Controllers\projets\ProjetsController::class, 'store'])->name('projets.store');
