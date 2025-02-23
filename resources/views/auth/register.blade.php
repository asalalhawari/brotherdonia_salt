@extends('site.layout.master')

@section('title') 
    {{ __('register') }} 
@endsection

@section('css') 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('login') }}">{{ __('login') }}</a></li>
    <li aria-current="page" class="breadcrumb-item active">{{ __('register') }}</li>
@endsection

@section('content')

<div class="col-12 py-5 px-5 login">
    <form method="POST" action="{{ route('register') }}">
        @csrf
    <div class="login-container">
        <img alt="Logo with Arabic calligraphy and a man in traditional attire" 
            src="{{ asset('asset-files/imgs/slider/logo.png') }}"
        />
        <h2>{{ __('create_account') }}</h2>

        <!-- Success Message -->
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Name Field -->
        <input id="name" type="text"
            class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('name') }}">

        <!-- Email Field -->
        <input id="email" type="email"
            class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('email') }}">

        <!-- Phone Field -->
        <input id="phone" type="text" 
            class="form-control @error('phone') is-invalid @enderror" name="phone"
            value="{{ old('phone') }}" required autocomplete="phone" placeholder="{{ __('phone') }}">

        <!-- Password Field -->
        <div class="password-container">
            <input placeholder="{{ __('password') }}" type="password" name="password"/>
        </div>

        <!-- Country Field -->
        <select name="country" autocomplete="off" id="country" class="form-control @error('country') is-invalid @enderror">
            <option value="">{{ __('select_country') }}</option>
            <option value="EG" {{ old('country') == 'EG' ? 'selected' : '' }}>{{ __('egypt') }}</option>
            <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>{{ __('usa') }}</option>
            <option value="SA" {{ old('country') == 'SA' ? 'selected' : '' }}>{{ __('saudi_arabia') }}</option>
            <option value="AE" {{ old('country') == 'AE' ? 'selected' : '' }}>{{ __('uae') }}</option>
            <option value="JO" {{ old('country') == 'JO' ? 'selected' : '' }}>{{ __('jordan') }}</option>
        </select>

        <!-- Currency Field -->
        <select name="currency" autocomplete="off" id="currency" class="form-control @error('currency') is-invalid @enderror">
            <option value="">{{ __('select_currency') }}</option>
            <option value="EGP" {{ old('currency') == 'EGP' ? 'selected' : '' }}>{{ __('egyptian_pound') }}</option>
            <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>{{ __('us_dollar') }}</option>
            <option value="SAR" {{ old('currency') == 'SAR' ? 'selected' : '' }}>{{ __('saudi_riyal') }}</option>
            <option value="AED" {{ old('currency') == 'AED' ? 'selected' : '' }}>{{ __('uae_dirham') }}</option>
            <option value="JOD" {{ old('currency') == 'JOD' ? 'selected' : '' }}>{{ __('jordanian_dinar') }}</option>
        </select>

        <!-- Submit Button -->
        <button type="submit" class="btn-login">
            {{ __('create_account') }}
        </button>
    </div>
    </form>
</div>

@endsection
