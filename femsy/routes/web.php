<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentControl;
use App\Http\Controllers\projectControl;
use App\Http\Controllers\svprojectControl;
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

Route::get("/redirect", [projectControl::class,"redirectFunct"]);
Route::get("/list", [studentControl::class,"show"]);
Route::get("/list2", [studentControl::class,"showsv"]);

Route::get("list", [studentControl::class, "show"]);
Route::view("push","coordinator/addStud");
Route::POST("/add", [studentControl::class, "addData"]);
Route::get("del/{id}", [studentControl::class, "deleteStud"]);
Route::get("upd/{id}", [studentControl::class, "showStud"]);
Route::POST("/edit", [studentControl::class, "update"]);

Route::get("senaraiproj", [projectControl::class, "show"]);
Route::get("pushproj",[projectControl::class, "addForm"]);
Route::POST("/addProject", [projectControl::class, "addProj"]);
Route::get("delproj/{id}", [projectControl::class, "deleteProj"]);
Route::get("updproj/{id}", [projectControl::class, "showProj"]);
Route::POST("/editproj", [projectControl::class, "updateProject"]);

Route::get("senaraiprojsv", [svprojectControl::class, "show"]);
Route::get("updprojsv/{id}", [svprojectControl::class, "showProj"]);
Route::POST("/editprojsv", [svprojectControl::class, "updateProject"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
