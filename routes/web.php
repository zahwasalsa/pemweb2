<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/home', function () {
    return 'ini halaman home';
});

Route::get('/chat', function () {
    return 'ini halaman pesan';
});

Route::get('/keranjang', function () {
    return 'ini halaman keranjang';
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
