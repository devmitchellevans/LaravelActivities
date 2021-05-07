<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::find(Auth::id());
        $posts = Post::get();
        $posts = $user->posts()->where('title','!=','')->get();
        $count = $user->posts()->where('title','!=','')->count();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' =>'required'
        ]);

        if($request->hasFile('img')){
            
            $filenameWithExtension = $request->file('img')->getclientOriginalName();

            $filename = pathinfo($filenameWithExtension, PATHINFO_EXTENSION);

            $extension = $request->file('img')->getClientOriginalExtension();

            $filenametoStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('img')->storeAs('public/img', $filenametoStore);
        } else{
            $filenametoStore ='';
        }
        //
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        $post->img = $filenametoStore;
        $post->save();

        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $post = \App\Models\Post::find($id);
        $comments = $post->comments;
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = \App\Models\Post::find($id);

        return view('posts.edit', compact('post'));

    }

    public function archive()
    {
        //
        $posts = POST::onlyTrashed()->get();

        return view('posts.archive', compact('posts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = \App\Models\Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = \App\Models\Post::find($id);
        $post->delete();
        
        return redirect('/posts');
    }
}
