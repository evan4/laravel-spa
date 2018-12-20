<?php
use App\Article;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $req) {

    if(isset($req->search) && !empty($req->search) ){
        $search = $req->search;
        $list = Article::listArticlesSite(3, $search);
  
      }else{
        $list = Article::listArticlesSite(3);
        $search = "";
      }
    
    return view('site', compact('list', 'search'));
})->name('site');

Route::get('/article/{id}/{title?}', function ($id) {
    $article = Article::find($id);
    if($article) {
        return view('article', compact('article'));
    }
    return redirect()->route('site');
})->name('article');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:eAdmin');

Route::middleware(('auth'))->prefix('admin')->namespace('Admin')->group(function(){
    Route::resource('articles', 'ArticlesController')->middleware('can:author');
    Route::resource('users', 'UsersController')->middleware('can:eAdmin');
    Route::resource('authors', 'AuthorsController')->middleware('can:eAdmin');
    Route::resource('adm', 'AdminController')->middleware('can:eAdmin');

});
