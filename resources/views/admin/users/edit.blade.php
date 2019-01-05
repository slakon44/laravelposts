@extends('layouts.admin')
@section('content')
    <h1>Edit Users</h1> <!--//197 instalacja formualrza composer require "laravelcollective/html":"^5.2.0" -->

    <div class="row"><!-- //212-->
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file:"http://placehold.it/400x400"}}" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
            {!! Form::model($user, (['method' => 'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true])) !!} <!-- //210 file-->
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}<!--//200-->
            </div>
            <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),null, ['class'=>'form-control']) !!} <!--//199 204-->
            </div>
            <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!} <!--//203  //206-->
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password',  ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::submit('Create Post', ['class'=>'btn btn-primary'])!!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
    <div class="row"><!-- //212-->
        @include('includes.form_error') <!-- //202 tworzenie obslugi bledow /resource/views/includes/form_error-->
    </div>


@stop
