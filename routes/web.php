<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('/gemini-ai-chat', 'gemini-ai-chat')->name('gemini-ai-chat');
});

require __DIR__.'/settings.php';
