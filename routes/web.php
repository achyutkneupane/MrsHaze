<?php



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

use App\Http\Livewire\Admin\AddArticle;
use App\Http\Livewire\Admin\Articles;
use App\Http\Livewire\Admin\Categories;
use App\Http\Livewire\Admin\EditArticle;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Tags;
use App\Http\Livewire\Guest\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/admin/{any}', function () {
    
// })->where('any', '.*');

Route::prefix('/admin')->middleware('auth')->group(function() {
    Route::get('/',Home::class)->name('admin.home');
    Route::get('/articles',Articles::class)->name('admin.articles');
    Route::get('/articles/add',AddArticle::class)->name('admin.articles.add');
    Route::get('/articles/edit/{id}',EditArticle::class)->name('admin.articles.edit');
    Route::get('/categories',Categories::class)->name('admin.categories');
    Route::get('/tags',Tags::class)->name('admin.tags');
});
Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::get( '/{any}', function () {
    return view('layouts.app');
})->where('any', '.*')->name('mrshaze');