@extends('layouts.app')

@section('body', 'login')

@section('content')
    <div class="container">
        <h1>Login</h1>

        @if(session('status'))<p>{{ session('status') }}</p>@endif
        @error('email')<p>{{ $message }}</p>@enderror

        <div class="flex-grid justify-center">
            <div class="col md-6">
                <form action="{{ url(app()->getLocale() . '/login') }}" method="post" class="form">
                    @csrf
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="inline-input">
                        <input type="checkbox" name="remember_me" id="remember_me">
                        <label for="remember_me">Remember Me</label>
                    </div>
                    <button type="submit">Log in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
