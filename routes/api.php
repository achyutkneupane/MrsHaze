<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/articles', [ArticleController::class,'index'])->name('articles.all');
Route::get('/article/{slug}', [ArticleController::class,'show'])->name('article.show');
Route::get('/articles/without/{slug}', [ArticleController::class,'others'])->name('article.others');
Route::get('/categories', [CategoryController::class,'index'])->name('categories.all');
Route::get('/category/{slug}', [CategoryController::class,'show'])->name('category.show');
Route::post('/subscribe',function(Request $request) {
    $email = collect($request->email)['value'];
    // return $email;
    Subscriber::create([
        'email' => $email,
    ]);
});