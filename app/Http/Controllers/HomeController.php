<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBreadcrumbs = json_encode ([
            [
                'title' => 'Home',
                'url' => route('home')
            ]
        ]);

        $totalUsers = User::count();
        $totalArticles = Article::count();
        $totalAuthors = User::where('author', '=', 'S')->count();;

        return view('home', compact('listBreadcrumbs', 
            'totalUsers', 'totalArticles', 'totalAuthors'));
    }
}
