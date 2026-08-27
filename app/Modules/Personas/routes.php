<?php

use App\Modules\Personas\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('personas')
    ->name('personas.')
    ->group(function () {

        Route::get('/', [PersonaController::class, 'index'])
            ->name('index');

        Route::get('/crear', [PersonaController::class, 'create'])
            ->name('create');

        Route::post('/', [PersonaController::class, 'store'])
            ->name('store');

        Route::get('/{persona}/editar', [PersonaController::class, 'edit'])
            ->name('edit');

        Route::put('/{persona}', [PersonaController::class, 'update'])
            ->name('update');

        Route::delete('/{persona}', [PersonaController::class, 'destroy'])
            ->name('destroy');
    });