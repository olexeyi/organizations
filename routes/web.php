<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DivisionController;

Route::get('/', fn() => redirect('/organizations'));

Route::resource('organizations', OrganizationController::class);

Route::get('divisions/create', [DivisionController::class, 'create'])->name('divisions.create');
Route::post('divisions', [DivisionController::class, 'store'])->name('divisions.store');
Route::get('divisions/{division}/edit', [DivisionController::class, 'edit'])->name('divisions.edit');
Route::put('divisions/{division}', [DivisionController::class, 'update'])->name('divisions.update');
Route::delete('divisions/{division}', [DivisionController::class, 'destroy'])->name('divisions.destroy');
