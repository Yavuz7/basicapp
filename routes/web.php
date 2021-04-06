<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Pages;
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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('post', Posts::class)->name('post');
Route::get('/posts/',[\App\Http\Controllers\PostsController::class, 'index'])->name('public_posts_index');
Route::get('/posts/{id}',[\App\Http\Controllers\PostsController::class, 'show'])->name('public_posts_show');
Route::middleware(['auth:sanctum', 'verified'])->get('page', Pages::class)->name('page');
Route::get('/pages/',[\App\Http\Controllers\PageController::class, 'index'])->name('pages_index');
Route::get('/pages/{id}',[\App\Http\Controllers\PageController::class, 'show'])->name('pages_show');
