<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ActifityController;
use App\Http\Controllers\JoinController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('members', MemberController::class);

Route::resource('user', userController::class);

Route::get('/search', [MemberController::class, 'search'])->name('search');

Route::resource('actifity', ActifityController::class);

Route::resource('join', JoinController::class);

Route::post('store-member', [MemberController::class, 'store'])->name('member.add');
//Route for storing the file

Route::post('store-file', [MemberController::class, 'storeFile'])->name('member.store_file');

Route::get('/members/{id}/report', [MemberController::class, 'report']);