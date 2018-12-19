<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\User;

class UsersController extends Controller
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
                'title' => 'users list',
                'url' => ""
            ],
        ]);
        $listModel =  User::select('id', 'name', 'email')->paginate(5);

        return view("admin.users.index", compact('listBreadcrumbs', 'listModel'));
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

        $validator = \Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $data['password'] = Hash::make($data['password']);

        User::create($data);
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
        return User::find($id);
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
        $data = $request->all(); 

        if ( isset($data['password']) && !empty($data['password']) ) {
            $validator = \Validator::make($data, [
                 'name' => ['required', 'string', 'max:255'],
                 'email' => ['required', 'string', 'email', 'max:255', 
                    Rule::unique('users')->ignore($id)],
                 'password' => ['required', 'string', 'min:6'],
             ]); 
             $data['password'] = Hash::make($data['password']);
         }else{
             $validator = \Validator::make($data, [
                 'name' => ['required', 'string', 'max:255'],
                 'email' => ['required', 'string', 'email', 'max:255', 
                    Rule::unique('users')->ignore($id)],
             ]);
            unset($data['password']);
         }

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        User::findOrFail($id)->update($data);
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
        User::findOrFail($id)->delete();
        return back();
    }
}
