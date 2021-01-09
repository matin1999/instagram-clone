@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>New Story</h1>
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

        <form action="{{ route('story.store') }}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="file is-boxed">
                    <label class="file-label">
                        <input class="file-input" type="file" name="image">
                    </label>
                </div>
            <button type="submit" class="btn btn-primary">Add Story</button>
        </form>
    </div>
@endsection
