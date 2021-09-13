@extends('layouts.app')

@section('body', 'forgot-password')

@section('content')
    <div>
        <h1>Forgot Password</h1>

        @if(session('status'))<p>{{ session('status') }}</p>@endif
        @error('email')<p>{{ $message }}</p>@enderror

        <div class="flex-grid justify-center">
            <div class="col md-6">
                <form action="{{ url(app()->getLocale() . '/forgot-password') }}" method="post">
                    @csrf
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    <button type="submit">Send reset link</button>
                </form>
            </div>
        </div>
    </div>
@endsection
