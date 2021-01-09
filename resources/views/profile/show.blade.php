@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="info">
            <div class="row">
                <div>
                    @if(count($user->stories)==0)
                    <img class="rounded-circle" style=" vertical-align: middle;width: 100px;height: 100px;border-radius: 100%;" src="{{is_link($user->image->path) ? $user->image->path : asset(str_replace('public','storage' ,$user->image->path))}}">
                    @else
                        <a href="{{route('story.show',$user->id)}}"><img class="rounded-circle" style=" display: block;border-radius: 50%;border: 5px solid transparent;box-shadow: 0 0 0 5px red; vertical-align: middle;width: 100px;height: 100px;" src="{{is_link($user->image->path) ? $user->image->path : asset(str_replace('public','storage' ,$user->image->path))}}"></a>
                    @endif
                </div>
                <br>
                    <br>
                <div>
                    <h4 class="title">
                        {{ $user->name}}
                    </h4>
                </div>

            </div>
        </div>
        <br>
        <br>
        <div class="text-center">
            <div class="row">
                <div class="col-sm font-weight-bold">
                    posts {{count($user->posts)}}
                </div>
                <div class="col-sm font-weight-bold">
                    <a href="{{route('followers.show',$user->id)}}">followers {{count($user->followers)}}</a>
                </div>
                <div class="col-sm font-weight-bold">
                    <a href="{{route('following.show',$user->id)}}">following {{count($user->followings)}}</a>
                </div>
            </div>
        </div>
        <br>
        <div class="biography">
            <a href="{{route('account.show',$user->id)}}">{{ '@'.$user->user_name }}</a>
            <h4>{{ $user->bio }}</h4>
        </div>
        <div class="user-button">
            @if(auth()->check())
            @if($user->id !== Auth::id())
                <form method="POST" action="{{route('account.follow',$user->id)}}" class="w100">
                    @csrf
                    @if($user->isFollowedBy(Auth::id()))
                        <input type="submit" class="btn btn-danger col-12"
                               value="{{ __('Unfollow') }}">
                    @else
                        <input type="submit" class="btn btn-primary col-12" value="{{ __('Follow') }}">
                    @endif
                </form>
            @else
                <a href="{{ route('account') }}" class="btn btn-secondary col-12"><span>{{__('Settings') }}</span></a>
            @endif
            @endif
        </div>
    </div>
    <hr class="border-secondary">
    <div class="container">
        <h1 class="font-weight-light text-center text-center">Posts</h1>
        @if($user->id == Auth::id())
        <a href="{{route('post.create',$user->id)}}"  class="btn btn-outline-success col-md-12">+</a>
        @endif
        <br>
        <br>
        <div class="row text-center text-lg-left">

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{route('post.show',$post->id)}}"><img class="img-fluid img-thumbnail" src="{{is_link($post->images->first()->path) ? $post->images->first()->path : asset(str_replace('public','storage' ,$post->images->first()->path))}}"></a>
                </div>
            @endforeach
        @else
            <p>Nothing</p>
        @endif
            <div class="row text-center text-lg-left">
            </div>
@endsection
