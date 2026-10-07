<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/','pages::index')->name('home');
Route::livewire('/products','pages::products.index')->name('products.index');
Route::livewire('/products/create','pages::products.create')->name('products.create');
