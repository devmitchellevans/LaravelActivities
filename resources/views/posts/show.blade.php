@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn button btn-info" href="/posts/create">Create New</a>
            <div class="card-body">
                Title:  {{$post->title}} <br>

                Description:  {{$post->description}} <br>
                
                Created at: {{$post->created_at}}<br>
                
                Post Image:
                @if ($post->img)
                    <img src="{{ URL::asset('/storage/img/'.$post->img) }}" alt="{{$post->img}}" style="width:100px; height:100px;"/>
                    @else
                    No image available
                    @endif
            </div>
        </div>
    </div>
    
</div>

@endsection