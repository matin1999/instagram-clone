@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>New Post</h1>
            <a href="{{ route('account.show',Auth::id()) }}" class="btn btn-secondary">Cancel</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="file is-boxed">
                    <label class="file-label">
                        <input class="file-input" type="file" name="image">
                    </label>
                </div>

            <div class="form-group">
                <label for="title">caption</label>
                <textarea type="text" class="form-control"  name="caption" placeholder="caption"></textarea>
                @error('title')<p class="m-0">{{ $message }}</p>@enderror
            </div>


            <div class="form-group form-check">
                <input type="hidden" name="done" value="0">
                <input type="checkbox" class="form-check-input" id="done" name="comment" value="1">
                <label class="form-check-label" for="done">open comment</label>
            </div>

            <button type="submit" class="btn btn-primary">share</button>
        </form>
    </div>
@endsection
