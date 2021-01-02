@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="info">
            <div class="row">
                <div>
                    <img class="rounded-circle" style="vertical-align: middle;width: 100px;height: 100px;border-radius: 100%;"
                         src="{{ $user->image ? $user->image->path : 'http://www.gravatar.com/avatar/3b3be63a4c2a439b013787725dfce802?d=identicon' }}">
                </div>
                <br>
                    <br>
                <div>
                    <h4 class="title">
                        {{ $user->name}}
                    </h4>
                    <h3 class="subtitle">
                        <a href="{{route('account.show',$user->id)}}">{{ '@'.$user->name }}</a>
                    </h3>
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
                    <a href="*">followers {{count($user->followers)}}</a>
                </div>
                <div class="col-sm font-weight-bold">
                    <a href="*">following {{count($user->followings)}}</a>
                </div>
            </div>
        </div>
        <br>
        <div class="biography">
            <h4>{{ $user->bio }}</h4>
        </div>
        <div class="user-button">
            @if($user->id !== Auth::id())
                <form method="POST" action="" class="w100">
                    @csrf
                    @if(Auth::user()->isFollowing( $user ))
                        <input type="submit" class="btn btn-danger col-12"
                               value="{{ __('Unfollow') }}">
                    @else
                        <input type="submit" class="btn btn-primary col-12" value="{{ __('Follow') }}">
                    @endif
                </form>
            @else
                <a href="{{ route('account') }}" class="btn btn-primary col-12"><span class="icon"><i
                            class="fas fa-cog"></i></span><span>{{
                __('Settings') }}</span></a>
            @endif
        </div>
    </div>
    <hr class="border-secondary">
    <div class="container">
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Posts</h1>
        <div class="row text-center text-lg-left">

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="col-lg-3 col-md-4 col-6">
                        <img class="img-fluid img-thumbnail" src="{{$post->images->first()->path}}">
                </div>
            @endforeach
        @else
            <p>Nothing</p>
        @endif
            <div class="row text-center text-lg-left">
            </div>
@endsection
