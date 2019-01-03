@extends('layouts.admin')
@section('content')
<h1>Create Users</h1> <!--//197 instalacja formualrza composer require "laravelcollective/html":"^5.2.0" -->
{!! Form::open(['method' => 'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!} <!-- //203 file-->
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
    {!! Form::select('role_id', [''=>'Choose Option']+$roles, null, ['class'=>'form-control']) !!}<!--//200-->
</div>
<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),0, ['class'=>'form-control']) !!} <!--//199 204-->
</div>
<div class="form-group">
{!! Form::label('file', 'File:') !!}
{!! Form::file('file', null, ['class'=>'form-control']) !!} <!--//203-->
</div>
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password',  ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!!  Form::submit('Create Post', ['class'=>'btn btn-primary'])!!}
</div>

{!! Form::close() !!}

@include('includes.form_error') <!-- //202 tworzenie obslugi bledow /resource/views/includes/form_error-->


@stop
