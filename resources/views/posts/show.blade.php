@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn button btn-info" href="/posts/create" style="margin-top: 7%;">Create New</a>
            <div class="card-body">
                Title:  {{$post->title}} <br>

                Description:  {{$post->description}} <br>
                
                Created at: {{$post->created_at}}<br>
                @if ($post->img != '')
                Image:
                    <img src="{{ URL::asset('/storage/img/'.$post->img) }}" alt="{{$post->img}}" style="width:100px; height:100px;"/>
                    @endif

                @include('/posts/comments')
            </div>
        </div>
    </div>
    
</div>

@endsection