<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\CarBon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();



/*
        $
        posts = Post::latest();
        if ($month = request('month'))
        {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = request('year'))
        {
            $posts->whereYear('created_at', $year);
        }
        $posts = $posts->get();
*/        





        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByraw('min(created_at) desc')
        ->get()
        ->toArray();

        //$posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts', 'archives'));

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
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

        auth()->user()->publish(
            new Post(request(['title','body']))
        );



/*
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
        ]);
*/

        return redirect('/');




    }
}
