<?php


use Illuminate\Support\Facades\Route;


if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === config('tenancy.central_domains.0')) {
    Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
        Route::get('admin/saas', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'index'])->name('syncs.index');
        Route::get('admin/saas/api', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'api'])->name('syncs.api');
        Route::get('admin/saas/create', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'create'])->name('syncs.create');
        Route::post('admin/saas', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'store'])->name('syncs.store');
        Route::get('admin/saas/{model}', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'show'])->name('syncs.show');
        Route::get('admin/saas/{model}/edit', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'edit'])->name('syncs.edit');
        Route::get('admin/saas/{model}/impersonate', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'impersonate'])->name('syncs.impersonate');
        Route::post('admin/saas/{model}', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'update'])->name('syncs.update');
        Route::delete('admin/saas/{model}', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'destroy'])->name('syncs.destroy');
    });
}

Route::get('admin/login/url', [\TomatoPHP\TomatoSaas\Http\Controllers\SyncController::class, 'url'])->name('login.url')->middleware(['web','splade']);

