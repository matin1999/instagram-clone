@extends('layouts.app')
@section('content')
    <div class="row text-center text-lg-left">
    @foreach($posts as $post)
        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{route('post.show',$post->id)}}"><img class="img-fluid img-thumbnail" src="{{is_link($post->images->first()->path) ? $post->images->first()->path : asset(str_replace('public','storage' ,$post->images->first()->path))}}"></a>
        </div>
    @endforeach
    </div>

    <div>
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
@endsection
