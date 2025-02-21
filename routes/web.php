<?php

use App\Http\Controllers\homeController;

use App\Http\Controllers\Recipes;
use App\Http\Controllers\sohourControlloer;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);
Route::post('/store', [HomeController::class, 'store'])->name('store.post');
Route::post('/addComment', [HomeController::class, 'addComment'])->name('comment.post');
Route::get('/comments/{post_id}', [HomeController::class, 'getComments'])->name('comment.get');
Route::get('/statistiques', [homeController::class, 'statistiquesIndex']);
Route::get('/iftar', [Recipes::class, 'indexRecips']);
Route::post('/add-recipe', [Recipes::class, 'storeRecipe'])->name('add.recipe');

