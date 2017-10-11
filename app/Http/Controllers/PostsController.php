<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        //$tasks = Task::all();
        //return view('posts.index', compact('posts'));
        return view('posts.index');
    }

    public function show()
    {
        //$tasks = Task::all();
        //return view('posts.index', compact('posts'));
        return view('posts.show');
    }

    public function create()
    {
        //$tasks = Task::all();
        //return view('posts.index', compact('posts'));
        return view('posts.create');
    }

    public function store()
    {
        //dd(request()->all());
        //dd(request('title'));
/*
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
*/
/*
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);
*/

        $this->validate(request(), [
            'title' => 'required|max:10',
            'body' => 'required',
        ]);

        Post::create(request(['title', 'body']));


        return redirect('/');




    }
}
