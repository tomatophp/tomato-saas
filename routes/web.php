<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/syncs', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'index'])->name('syncs.index');
    Route::get('admin/syncs/api', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'api'])->name('syncs.api');
    Route::get('admin/syncs/create', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'create'])->name('syncs.create');
    Route::post('admin/syncs', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'store'])->name('syncs.store');
    Route::get('admin/syncs/{model}', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'show'])->name('syncs.show');
    Route::get('admin/syncs/{model}/edit', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'edit'])->name('syncs.edit');
    Route::get('admin/syncs/{model}/impersonate', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'impersonate'])->name('syncs.impersonate');
    Route::post('admin/syncs/{model}', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'update'])->name('syncs.update');
    Route::delete('admin/syncs/{model}', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'destroy'])->name('syncs.destroy');
});

Route::get('admin/login/url', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'url'])->name('login.url')->middleware(['web','splade']);

