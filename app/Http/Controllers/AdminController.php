<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Article;

class AdminController extends Controller
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
                'title' => 'Admin',
                'url' => ""
            ]
        ]);

        $totalUsers = User::count();
        $totalArticles = Article::count();
        $totalAuthors = User::where('author', '=', 'S')->count();;
        $totalAdmins = User::where('admins', '=', 'S')->count();;

        return view('admin', compact('listBreadcrumbs', 
            'totalUsers', 'totalArticles', 'totalAuthors', 'totalAdmins'));
    }
}
