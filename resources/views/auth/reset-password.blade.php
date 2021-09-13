@extends('layouts.app')

@section('body', 'reset-password')

@section('content')
    <div>
        <h1>Reset Password</h1>

        @error('email')<p>{{ $message }}</p>@enderror

        <div class="flex-grid justify-center">
            <div class="col md-6">
                <form action="{{ url(app()->getLocale() . '/reset-password') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation">
                    </div>
                    <button type="submit">Reset password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
