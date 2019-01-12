@extends('layouts.admin')


@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th> <!-- //223 230-->

            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody><!---195-->
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td scope="row">{{$post->id}}</td>
                    <td scope="row"><img height="50" src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400"}}"></td> <!--230-->
                    <td scope="row">{{$post->user->name}}</td> <!--//224-->
                    <td scope="row">{{$post->category ? $post->category->name : 'Uncategorized'}}</td><!--//231-->
                    <td scope="row">{{$post->title}}</td>
                    <td scope="row">{{$post->body}}</td>
                    <td scope="row">{{$post->created_at->diffForhumans()}}</td>
                    <td scope="row">{{$post->updated_at->diffForhumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop