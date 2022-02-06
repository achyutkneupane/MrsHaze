<?php

use App\Http\Livewire\FE\Pages\LandingPage;
use App\Http\Livewire\FE\Pages\Login;
use App\Http\Livewire\FE\Pages\ViewArticle;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',LandingPage::class)->name('landing-page');
Route::get('/article/{slug}', ViewArticle::class)->name('view-article');

// Route::prefix('/admin')->middleware('auth')->group(function() {
//     Route::get('/',Home::class)->name('admin.home');
//     Route::get('/articles',Articles::class)->name('admin.articles');
//     Route::get('/articles/add',AddArticle::class)->name('admin.articles.add');
//     Route::get('/articles/edit/{id}',EditArticle::class)->name('admin.articles.edit');
//     Route::get('/categories',Categories::class)->name('admin.categories');
//     Route::get('/tags',Tags::class)->name('admin.tags');
// });
Route::get('/login', Login::class)->middleware('guest')->name('login');