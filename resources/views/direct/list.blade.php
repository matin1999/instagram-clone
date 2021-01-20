@extends('layouts.app')
@section('content')
<div class="container">
    @foreach($users as $user)
        <a href="{{route('direct.show',$user->id)}}">
            <div class="media border p-3">
                <img src="{{$user->image ? $user->image->path : 'http://www.gravatar.com/avatar/3b3be63a4c2a439b013787725dfce802?d=identicon'}}"  class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <div class="media-body">
                    <h4><a href="{{route('account.show',$user->id)}}">{{$user->user_name}}</a></h4>

                </div>
                <a href="{{route('direct.show',$user->id)}}"><i class="fa fa-telegram">Direct</i></a>
            </div>
        </a>
        <br>
    @endforeach
</div>
@endsection
