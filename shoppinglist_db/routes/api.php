<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\shoppingItemController;
use App\Models\ShoppingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Categories
Route::get('categories', [CategoryController::class, 'getAll']);

Route::post('categories', [CategoryController::class, 'store']);

Route::delete('categories/{id}', [CategoryController::class, 'delete']);

// ShoppingItems
Route::get('shoppingitems', [shoppingItemController::class, 'getAll']);

Route::post('shoppingitems', [shoppingItemController::class, 'store']);

Route::delete('shoppingitems/{id}', [shoppingItemController::class, 'delete']);