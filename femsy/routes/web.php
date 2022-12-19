<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentControl;

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
});
Route::get("list", [studentControl::class, "show"]);
Route::view("push","addStud");
Route::POST("/add", [studentControl::class, "addData"]);
Route::get("del/{id}", [studentControl::class, "deleteStud"]);
Route::get("upd/{id}", [studentControl::class, "showStud"]);
Route::POST("/edit", [studentControl::class, "update"]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
