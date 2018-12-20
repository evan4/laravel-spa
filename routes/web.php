<?php
use App\Article;

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

Route::get('/', function () {
    $list = Article::listArticlesSite(3);
    return view('site', compact('list'));
})->name('site');

Route::get('/article/{id}/{title?}', function ($id) {
    $article = Article::find($id);
    if($article) {
        return view('article', compact('article'));
    }
    return redirect()->route('site');
})->name('article');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::middleware(('auth'))->prefix('admin')->namespace('Admin')->group(function(){
    Route::resource('articles', 'ArticlesController');
    Route::resource('users', 'UsersController');
    Route::resource('authors', 'AuthorsController');
    Route::resource('adm', 'AdminController');

});
