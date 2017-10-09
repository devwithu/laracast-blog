<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
