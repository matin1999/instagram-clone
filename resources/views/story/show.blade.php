@extends('layouts.app')
@section('content')

<div class="container-fluid px-0" style="background-color: #2d3748">
    <a href="{{route('account.show',$stories->first()->creator->id)}}"><img class="rounded-circle" style=" display: block;border-radius: 50%;border: 5px solid transparent;box-shadow: 0 0 0 5px red; vertical-align: middle;width: 100px;height: 100px;" src="{{is_link($stories->first()->creator->image->path) ? $stories->first()->creator->image->path : asset(str_replace('public','storage' ,$stories->first()->creator->image->path))}}"></a>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner bg-info" role="listbox">
            @foreach($stories as $story)
                @foreach($story->images as $image)
                @endforeach
            <div class="carousel-item {{ $loop->first ? 'active' : '' }} ">
                <div class="d-flex align-items-center justify-content-center min-vh-100">
                    <img  src="{{ is_link($image->path) ? $image->path : asset(str_replace('public','storage' ,$image->path)) }}" />
                </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection
