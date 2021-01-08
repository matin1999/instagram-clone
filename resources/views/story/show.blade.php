@extends('layouts.app')
@section('content')
{{--    <div>--}}
{{--        @foreach($stories as $story)--}}
{{--            @foreach($story->images as $image)--}}
{{--                <img  src="{{ is_link($image->path) ? $image->path : asset(str_replace('public','storage' ,$image->path)) }}" />--}}
{{--                @foreach($story->mentions as $mention)--}}
{{--                    <a  class="font-weight-bolder" href="{{route('account.show',$mention->user->id)}}">{{$mention->user->user_name }}--}}
{{--                    </a>--}}
{{--                @endforeach--}}
{{--            @endforeach--}}

{{--        @endforeach--}}
{{--    </div>--}}

@endsection
