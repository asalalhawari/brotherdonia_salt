@extends('site.layout.master')
@section('title')
    @langucw('login')
@endsection
@section('css')
@endsection
@section('breadcrumb')
    <li><a href="{{ route('home') }}">@langucw('home')</a></li>
    <li>@langucw('login')</li>
@endsection


@section('content')

    <div class="col-12 py-5 px-5 login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-container">
                <img alt="Logo with Arabic calligraphy and a man in traditional attire" 
                    src="{{ asset('asset-files/imgs/slider/logo.png') }}" />
                <h2>
                    تسجيل الدخول
                </h2>
                
                <!-- Email Input -->
                <input placeholder="البريد الإلكتروني" 
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
                    <input placeholder="كلمة المرور" 
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
                    نسيت كلمة المرور؟
                </a>

                <div class="btn-container">
                    <a href="{{ route('register') }}" class="btn-create">
                        إنشاء حساب
                    </a>
                    <button type="submit" class="btn-login">
                        تسجيل الدخول
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
