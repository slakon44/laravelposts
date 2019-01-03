@extends('layouts.admin')


@section('content')

    <h1>user</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody><!---195-->
        @if($users)
            @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role['name']}}</td>
            <td>{{$user->is_active==1 ? 'Active':'No Active'}}</td> <!--//196 -->
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
            @endforeach
            @endif
        </tbody>
    </table>

@stop