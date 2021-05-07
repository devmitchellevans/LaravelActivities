@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn button btn-info" href="/posts" style="margin-top:6%;">Back</a> <br><br>
            <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('posts.update', $post->id) }}" class="form-group">
                    @method('PATCH')
                    @csrf
                        <input type="text" name="title" value="{{ $post->title }}"  class="form-control">
                        <input type="text" name="title" value="{{ $post->description }}"  class="form-control">
                        <br>
                        <input class="btn btn-primary" type="submit" name="Submit">
            </div>
            </div>
        </div>
    </div>
    
</div>

@endsection