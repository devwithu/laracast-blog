@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">
        <h1> {{ $post->title }} </h1>

        {{ $post->body }}

        <hr>

        <div class="comments">
            <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <string>
                        {{ $comment->created_at }}
                    </string>
                    {{ $comment->body }}
                </li>

            @endforeach
            </ul>
        </div>

        <hr>
        <div class="card">
            <div class="card-block">
                <form method="post" action="/posts/{{ $post->id }}/comments">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="Your commnet here.">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btm-primary">Add Commnet</button>
                    </div>
                </form>

                @include ('layouts.errors')
            </div>
        </div>

    </div>

@endsection
