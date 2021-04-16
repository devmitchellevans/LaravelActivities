@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn button btn-info" href="/posts/create">Create New</a>
            <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('posts.update', $post->id) }}">
                    @method('PATCH')
                    @csrf
                        <input type="text" name="title" value="{{ $post->title }}">
                        <textarea name="description" value="{{ $post->description }}">
                            {{$post->description}}
                        </textarea>
                        <input type="submit" name="Submit">
            </div>
            </div>
        </div>
    </div>
    
</div>

@endsection