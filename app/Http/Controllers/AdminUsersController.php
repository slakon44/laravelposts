<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //195
use App\Role; //200 - create user
use App\Http\Requests\UsersRequest; //201 - stworzenie request w //201
use App\Http\Requests;

class AdminUsersController extends Controller
{
    //189 php artisan make:controller -resource AdminUsersController
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();

        return view('admin.users.index', compact("users"));//190  //195
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::lists('name', 'id')->all(); //200 - zwroci liste rol z bazy danych

        return view('admin.users.create', compact('roles')); //190 //200
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request) //201 dodałem UsersRequest
    {
        //198
        //return $request->all();
        //201 php artisan make:request UsersRequest
       User::create($request->all()); //204
       return redirect('/admin/users'); //204
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
