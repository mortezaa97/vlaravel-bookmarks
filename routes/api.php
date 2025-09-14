<?php

declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use Mortezaa97\Bookmarks\Http\Controllers\BookmarkController;

Route::prefix('api/bookmarks')->group(function () {
    Route::get('/', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::get('/{bookmark}', [BookmarkController::class, 'show'])->name('bookmarks.show');

});
