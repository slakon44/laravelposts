<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest; //213 - dodatkowe zapytanie - przy updatcie uzytkownika
use Illuminate\Http\Request;
use App\User; //195
use App\Role; //200 - create user
use App\Photo; //208 - create user
use App\Http\Requests\UsersRequest; //201 - stworzenie request w //201
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

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

        if(trim($request->password) == ''){ //214
            $input = $request->except('password'); //214
        }
        else{
            $input = $request->all(); //214
            $input['password'] = bcrypt($request->password);
        }
        //198
        //return $request->all();
        //201 php artisan make:request UsersRequest
       //User::create($request->all()); //204

        $input = $request->all(); //206
        if($file = $request->file('photo_id')){ //206
            //return "photo exist"; ///206
            //207
            $name = time().$file->getClientOriginalName(); //207
            $file->move('images', $name); //207
            $photo = Photo::create(['file'=>$name]); //207
            $input['photo_id'] = $photo->id; //207
        }

        //214 usuwam  $input['password'] = bcrypt($request->password); //208
        User::create($input); //208




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
        //210
        $user = User::findOrFail($id);
        $roles = Role::lists('name','id')->all();
        return view('admin.users.edit', compact('user', 'roles')); //210

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id) //212 zmieniam na usersrequest (jest obsluga wtedy błędów
    {
        //
        $user = User::findOrFail($id);//212

        if(trim($request->password) == ''){ //214
            $input = $request->except('password'); //214
        }
        else{
            $input = $request->all(); //214
            $input['password'] = bcrypt($request->password);
        }



        //return $request->all(); //212
       // $input = $request->all();
        if($file = $request->file('photo_id')){ //212
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);//213
            $input['photo_id'] = $photo->id;//213
        }
        $user->update($input);
        return redirect('/admin/users');
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
       // return "DESTROY";//217
        //User::findOrFail($id)->delete();//217
        $user = User::findOrFail($id); //218
        unlink(public_path(). $user->photo->file);
        $user->delete();

        Session::flash('deleted_user','The user has been deleted');//218

        return redirect('admin/users');//217
    }
}
