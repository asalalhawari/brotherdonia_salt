@extends('site.layout.master')

@section('title')
    {{ __('login') }}
@endsection

@section('css')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('home') }}">{{ __('home') }}</a></li>
    <li>{{ __('login') }}</li>
@endsection

@section('content')

    <div class="col-12 py-5 px-5 login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-container">
                <img alt="Logo with Arabic calligraphy and a man in traditional attire" 
                    src="{{ asset('asset-files/imgs/slider/logo.png') }}" />
                <h2>
                    {{ __('login') }}
                </h2>
                
                <!-- Email Input -->
                <input placeholder="{{ __('email') }}" 
                    type="email" 
                    name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" 
                    required autocomplete="email" autofocus />
                
                <!-- Display email error -->
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <!-- Password Input -->
                <div class="password-container">
                    <input placeholder="{{ __('password') }}" 
                        type="password" 
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        required autocomplete="current-password" />
                </div>
                
                <!-- Display password error -->
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <a href="{{ route('password.request') }}">
                    {{ __('forgot_password') }}
                </a>

                <div class="btn-container">
                    <a href="{{ route('register') }}" class="btn-create">
                        {{ __('create_account') }}
                    </a>
                    <button type="submit" class="btn-login">
                        {{ __('login') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
