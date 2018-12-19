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
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::middleware(('auth'))->prefix('admin')->namespace('Admin')->group(function(){
    Route::resource('articles', 'ArticlesController');
    Route::resource('users', 'UsersController');
    Route::resource('authors', 'AuthorsController');
});
