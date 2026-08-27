<?php

require base_path('app/Modules/Autenticacion/routes.php');
require base_path('app/Modules/Personas/routes.php');
require base_path('app/Modules/FormacionAcademica/routes.php');

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
