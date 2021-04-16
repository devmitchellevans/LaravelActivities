
@extends('layouts.app')
@section('content')
<form method="POST" action="/posts">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <input name="description" placeholder="Description"> </textarea>

    <input type="submit" value="Submit">

</form>
@endsection