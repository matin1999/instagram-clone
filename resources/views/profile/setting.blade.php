@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-body">
            <h1>{{ __('My Account') }}</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif
            <form method="POST" action="{{ route('account.update') }}" enctype="multipart/form-data">
                <!-- CSRF Token -->
            @csrf
            <!-- Method -->
                @method('PATCH')

                <div class="row">
                    <!-- Image Input -->
                    <div class="image-upload profile-image">
                        <div class="file is-boxed">
                            <label class="file-label">
                                <input class="file-input" type="file" name="image">
                            </label>
                        </div>
                    </div>

                    <div class="profile-inputs">
                        <div class="field">
                            <label class="label has-text-white">{{ __('user name') }}</label>
                            <div class="control">
                                <input class="input" type="text" name="user_name" value="{{ isset($user->display_name) ? $user->user_name : '' }}"
                                       autofocus>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label has-text-white">{{ __('Bio') }}</label>
                            <div class="control">
                                <textarea class="textarea has-fixed-size" name="bio" maxlength="128">{{ isset($user->bio) ? $user->bio : '' }}</textarea>
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="field">
                            <label class="label has-text-white">{{ __('E-Mail Address') }}</label>
                            <div class="control">
                                <input class="input" type="email" name="email" placeholder="example@example.com" value="{{ $user->email }}"
                                       required>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="field">
                            <label class="label has-text-white">{{ __('Password') }}</label>
                            <div class="control">
                                <input class="input" type="password" name="password" required>
                            </div>
                        </div>

                        <!-- New Password Input -->
                        <a class="has-text-primary mb" onclick="this.classList.add('is-hidden'); document.querySelector('#new-pass').classList.remove('is-hidden')">
                            {{ __('Change password?') }}
                        </a>
                        <div class="field is-hidden">
                            <label class="label has-text-white">{{ __('New Password') }}</label>
                            <div class="control">
                                <input class="input" type="password" name="new_password">
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div>
                            <div class="control">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
