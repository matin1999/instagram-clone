@extends('layouts.app')
@section('content')
<div class="container">
    @foreach($follow as $user)
            <div class="media border p-3">
                <img src="{{$user->image ? $user->image->path : 'http://www.gravatar.com/avatar/3b3be63a4c2a439b013787725dfce802?d=identicon'}}"  class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <div class="media-body">
                    <h4><a href="{{route('account.show',$user->id)}}">{{$user->user_name}}</a></h4>
                </div>
            </div>
        @if(auth()->check())
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

        @endif
        @endif
    @endforeach
</div>
@endsection
