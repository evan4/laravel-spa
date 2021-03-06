<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBreadcrumbs = json_encode ([
            [
                'title' => 'Admin',
                'url' => route('admin')
            ],
             [
                'title' => 'shopping list',
                'url' => ""
            ],
        ]);

        $listArticles = Article::listArticles(5);
        
        return view("admin.articles.index", compact('listBreadcrumbs', 'listArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); 
        $data['data'] = date('Y-m-d', strtotime($data['data']));
        
        $validator = \Validator::make($data, [
            "title" => "required",
            "description" => "required",
            "content" => "required",
            "data" => "required|date",
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        Article::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Article::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $data = $request->all(); 
        $data['data'] = date('Y-m-d', strtotime($data['data']));

        $validator = \Validator::make($data, [
            "title" => "required",
            "description" => "required",
            "content" => "required",
            "data" => "required|date",
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        Article::findOrFail($id)->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return back();
    }
}
