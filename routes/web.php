<?php

use App\Livewire\Shop;
use App\Livewire\TodoPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Demo;

Route::get('/', function () {
    return view("home");
})->name('home');
Route::view('contact', 'contact')->name('contact');
Route::view('mycomponents', 'mycomponents')->name('my-components');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect ('/', '/admin/records');
    Route::get('records', Demo::class)->name('records');
    Route::view('download_covers', 'admin.download_covers')->name('download_covers');
});
Route::view('playground', 'playground')->name('playground');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::view('under-construction', 'under-construction')->name('under-construction');
Route::get('shop', Shop::class)->name('shop');
Route::get('todos',TodoPage::class)->name('todos');

