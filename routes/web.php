<?php

use App\Http\Controllers\{
    UserController
};
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
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); //observe que essa tem de ser declarada antes pq cairá dentro do param, que é dinâmico, id
Route::post('/users', [UserController::class, 'store'])->name('users.store'); //observe que essa tem de ser declarada antes pq cairá dentro do param, que é dinâmico, id

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


Route::get('/', function () {
    return view('welcome');
});


