<?php

use App\Http\Livewire\BE\Pages\AddArticle;
use App\Http\Livewire\BE\Pages\Articles;
use App\Http\Livewire\BE\Pages\Categories;
use App\Http\Livewire\BE\Pages\EditArticle;
use App\Http\Livewire\BE\Pages\Home;
use App\Http\Livewire\BE\Pages\Tags;
use App\Http\Livewire\FE\Pages\AllSongs;
use App\Http\Livewire\FE\Pages\LandingPage;
use App\Http\Livewire\FE\Pages\Login;
use App\Http\Livewire\FE\Pages\ViewArticle;
use App\Http\Livewire\FE\Pages\ViewSong;
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
Route::get('/songs', function() {
    $latestSong = \App\Models\Song::orderByDesc('released_at')->first();
    return redirect()->route('view-song',$latestSong->slug);
})->name('all-songs');
Route::get('/song/{slug}', ViewSong::class)->name('view-song');

Route::prefix('/admin')->middleware('auth')->group(function() {
    Route::get('/',Home::class)->name('admin.home');
    Route::get('/articles',Articles::class)->name('admin.articles');
    Route::get('/articles/add',AddArticle::class)->name('admin.articles.add');
    Route::get('/articles/edit/{id}',EditArticle::class)->name('admin.articles.edit');
    Route::get('/categories',Categories::class)->name('admin.categories');
    Route::get('/tags',Tags::class)->name('admin.tags');
});


Route::get('/login', Login::class)->middleware('guest')->name('login');