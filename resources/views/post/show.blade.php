{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <div class="container justify-content-center">--}}
{{--        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">--}}
{{--        <div class="carousel-inner">--}}
{{--            @foreach($post->images as $image)--}}
{{--            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">--}}
{{--                <img  src="{{ is_link($image->path) ? $image->path : asset(str_replace('public','storage' ,$image->path)) }}"/>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">--}}
{{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Previous</span>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--@endsection--}}
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
                    <div>
                        <img class="rounded-circle" style="vertical-align: middle;width: 100px;height: 100px;border-radius: 100%;"
                             src="{{is_link($post->author->image->path) ? $post->author->image->path : asset(str_replace('public','storage' ,$post->author->image->path))}}">
                    </div>
                    <br>
                    <br>
                    <div>
                        <h4 class="title">
                            {{ $post->author->image->user_name}}
                        </h4>
                        <div class="pt-4 space-y-5 text-left pb-4 border-b">
                            <div class="space-x-4">
                                <p class="text-gray-500 text-xs font-medium leading-7">Caption:</p>
                                <h2 class="text-gray-800 mb-2 tracking-wide">{{ $post->caption }}</h2>
                            </div>
                        </div>
                    </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
