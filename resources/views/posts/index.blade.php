@extends('layouts.app')
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 75%;
  margin: 13%;
  margin-top: 2%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  
}

tr:nth-child(even) {
  background-color: #dddddd;
  
}
</style>


@section('content')
<div class="content">
<a class="btn button btn-info" href="/posts/create" style="margin-left: 13%; margin-top: 5%;">Create New</a>
<table>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
@foreach($posts as $post)
<tr>
    <td>{{ $post->id }}</td>
    <td>{{ $post->title }}</td>
    <td>{{ $post->description }}</td>
    <td>
         <a class="btn btn-primary" href="/posts/{{ $post->id}}" role="button"> View</a>
         <a class="btn btn-primary" href="/posts/{{ $post->id}}/edit" role="button"> Edit</a>
    </td>
    <td>
        <form action="posts/{{ $post->id }} " method="POST">
            @csrf
            @method("DELETE")
            <button style="position: relative; margin-left: -170px; top: 8px" type="submit" name="submit" value="Delete" class="btn btn-danger"> Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
</div>


