<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::get('/admin', function(){
    return view('admin.index');//193
});

//215 przensoze ponizej Route::resource('admin/users', 'AdminUsersController'); //189
//nie trzeba Route::resource('admin/users/create','AdminUsersController'); //196

Route::group(['middleware'=>'admin'], function (){ //215
   Route::resource('admin/users', 'AdminUsersController'); // 215

   Route::resource('admin/posts', 'AdminPostsController'); // 221 - towrzymy route i potem controler
    //php artisan make:controller --resource AdminPostsController //221

});

