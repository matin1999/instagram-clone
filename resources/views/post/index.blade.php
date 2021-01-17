@extends('layouts.app')
@section('content')
    <section class="bg-gray-50">
        <div class="container mx-auto min-h-screen  flex justify-center lg:justify-between max-w-5xl mx-auto px-0 sm:px-6 lg:px-8">
            <div class="md:max-w-xl mt-2 sm:mt-10 md:mt-16 py-10 md:max-h-screen md:overflow-y-scroll hidden-scroll">
                <div class="">
                    @foreach($posts as $post)
                        <div class="text-left">
                                <img src="{{$post->author->image ? $post->author->image->path : 'http://www.gravatar.com/avatar/3b3be63a4c2a439b013787725dfce802?d=identicon'}}"  class="mr-3 mt-3 rounded-circle" style="width:60px;">
                            <a href="{{ route('account.show', $post->author->id) }}">
                                <h2 class="font-normal text-xs tracking-wide text-gray-400">{{$post->author->user_name }}</h2>
                            </a>
                        </div>
                        <div class="w-full sm:border border-gray-200 mb-8 sm:mb-12 md:mb-16 md:rounded-md bg-white">
                            <div class="mt-4 pt-4 sm:pt-0 w-full px-2 sm:px-4 flex justify-between pb-2">
                                <div class="flex items-center justify-start space-x-4 w-full">
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
                            </div>

                            <div>
                                <a href="{{ route('post.show', $post->id) }}">
                                <p class="text-sm px-2 sm:px-4 py-3 text-gray-700">{{ $post->caption }}</p>
                                </a>
                            </div>


                            <div class="mt-3 w-full pl-4 pr-4">
                                <div class="pb-2">
                                        <div>likes: {{count($post->likes)}}
                                            <br>
                                            <form method="POST" action="{{route('post.like',$post->id)}}" class="w100">
                                                @csrf
                                                @if(count($post->likes)==0)
                                                    <button type="submit" class="btn" value="{{ __('like') }}"><i class="fa fa-heart btn" style="color: gray" ></i></button>
                                                @else
                                                    <button type="submit" class="btn" value="{{ __('unlike') }}"><i class="fa fa-heart btn" style="color: red" ></i></button>
                                                @endif
                                            </form>

                                        </div>
{{--                                    @foreach($post->comment as $comment)--}}
{{--                                        <p class="text-sm">--}}
{{--                                            <a href="{{ route('profile.show', $comment->user->username) }}"--}}
{{--                                               class="font-medium ">{{ $comment->user->username }}</a> {{ $comment->body }}--}}
{{--                                        </p>--}}
{{--                                    @endforeach--}}
                                </div>


                                <p class="text-gray-500 text-xs pb-2 text-right w-full leading-tight tracking-tight">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
