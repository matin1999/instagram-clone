@extends('layouts.app')
@section('content')
    <section class="pt-10 md:pt-16 gray">
        <div class="container max-w-5xl mx-auto md:px-6 lg:px-8 md:pt-8">
            <div class="hidden md:block">
                <div class="flex space-x-6 justify-between">
                    <div class="w-8/12">
                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($post->images as $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img  src="{{ is_link($image->path) ? $image->path : asset(str_replace('public','storage' ,$image->path)) }}"/>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                    </div>
                    <br>
                    <hr>
                   {{--        like bottun and counters        --}}
                    <div>likes: {{count($post->likes)}}
                        <br>
                        <form method="POST" action="{{route('post.like',$post->id)}}" class="w100">
                            @csrf
                            @if(count($like)==0)
                                <button type="submit" class="btn" value="{{ __('like') }}"><i class="fa fa-heart btn" style="color: gray" ></i></button>
                            @else
                                <button type="submit" class="btn" value="{{ __('unlike') }}"><i class="fa fa-heart btn" style="color: red" ></i></button>
                            @endif
                        </form>

                    </div>
                    {{--                      --}}
                    <hr>
                    <div>
                        <a href="{{route('account.show',$post->author->id)}}"><img class="rounded-circle" style="vertical-align: middle;width: 100px;height: 100px;border-radius: 100%;"
                             src="{{is_link($post->author->image->path) ? $post->author->image->path : asset(str_replace('public','storage' ,$post->author->image->path))}}">
                        </a>
                            {{ $post->author->user_name}}

                    </div>
                    <div>

                        <div class="pt-4 space-y-5 text-left pb-4 border-b">
                            <div class="space-x-4">
                                <p class="text-gray-500 text-xs font-medium leading-7">Caption:</p>
                                <h2 class="text-gray-800 mb-2 tracking-wide">{{ $post->caption }}</h2>
                                @foreach($post->tags as $tag)
                                    <a class="font-weight-bolder" href="*">#{{$tag->title}}</a>
                                @endforeach
                                @foreach($post->mentions as $mention)
                                    <a class="font-weight-bolder" href="{{route('account.show',$mention->user->id)}}">
                                        @ {{$mention->user->user_name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
{{--                            other comments                           --}}
                    </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
