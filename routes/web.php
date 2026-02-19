<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RickMortyClientController;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/characters', [RickMortyClientController::class, 'index'])->name('characters.index');
Route::get('/characters/create', [RickMortyClientController::class, 'create'])->name('characters.create');
Route::post('/characters', [RickMortyClientController::class, 'store'])->name('characters.store');       

Route::get('/characters/{id}/edit', [RickMortyClientController::class, 'edit'])->name('characters.edit');
Route::put('/characters/{id}', [RickMortyClientController::class, 'update'])->name('characters.update');

Route::delete('/characters/{id}', [RickMortyClientController::class, 'destroy'])->name('characters.destroy');
