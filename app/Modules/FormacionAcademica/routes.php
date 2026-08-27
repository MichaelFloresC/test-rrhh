<?php

use App\Modules\FormacionAcademica\Http\Controllers\FormacionAcademicaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('personas/{persona}/formaciones-academicas')
    ->name('personas.formaciones.')
    ->group(function () {

        Route::get(
            '/',
            [FormacionAcademicaController::class, 'index']
        )->name('index');

        Route::post(
            '/',
            [FormacionAcademicaController::class, 'store']
        )->name('store');

        Route::put(
            '/{formacion}',
            [FormacionAcademicaController::class, 'update']
        )->name('update');

        Route::delete(
            '/{formacion}',
            [FormacionAcademicaController::class, 'destroy']
        )->name('destroy');

    });