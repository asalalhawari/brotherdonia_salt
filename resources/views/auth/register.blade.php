@extends('site.layout.master')

@section('title') 
    @langucw('register') 
@endsection

@section('css') 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">@langucw('home')</a></li>
    <li class="breadcrumb-item"><a href="{{route('login')}}">@langucw('login')</a></li>
    <li aria-current="page" class="breadcrumb-item active">@langucw('register')</li>
@endsection

@section('content')

<div class="col-12 py-5 px-5 login">
    <form method="POST" action="{{ route('register') }}">
        @csrf
    <div class="login-container">
        <img alt="Logo with Arabic calligraphy and a man in traditional attire" 
            src="{{ asset('asset-files/imgs/slider/logo.png') }}"
        />
        <h2>إنشاء حساب</h2>

        <!-- إذا كانت هناك رسالة نجاح، عرضها هنا -->
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Name Field -->
        <input id="name" type="text"
            class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="الاسم">

        <!-- Email Field -->
        <input id="email" type="email"
            class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" placeholder="البريد الالكتروني">

        <!-- Phone Field -->
        <input id="phone" type="text" 
            class="form-control @error('phone') is-invalid @enderror" name="phone"
            value="{{ old('phone') }}" required autocomplete="phone" placeholder="رقم الهاتف">

        <!-- Password Field -->
        <div class="password-container">
            <input placeholder="كلمة المرور" type="password" name="password"/>
        </div>

        <!-- Country Field -->
        <select name="country" autocomplete="off" id="country" class="form-control @error('country') is-invalid @enderror">
            <option value="">{{__('اختر الدولة')}}</option>
            <option value="EG" {{ old('country') == 'EG' ? 'selected' : '' }}>مصر</option>
            <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>الولايات المتحدة</option>
            <option value="SA" {{ old('country') == 'SA' ? 'selected' : '' }}>السعودية</option>
            <option value="AE" {{ old('country') == 'AE' ? 'selected' : '' }}>الإمارات</option>
            <option value="JO" {{ old('country') == 'JO' ? 'selected' : '' }}>الأردن</option>
        </select>

        <!-- Currency Field -->
        <select name="currency" autocomplete="off" id="currency" class="form-control @error('currency') is-invalid @enderror">
            <option value="">{{__('اختر العملة')}}</option>
            <option value="EGP" {{ old('currency') == 'EGP' ? 'selected' : '' }}>جنيه مصري</option>
            <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>دولار أمريكي</option>
            <option value="SAR" {{ old('currency') == 'SAR' ? 'selected' : '' }}>ريال سعودي</option>
            <option value="AED" {{ old('currency') == 'AED' ? 'selected' : '' }}>درهم إماراتي</option>
            <option value="JOD" {{ old('currency') == 'JOD' ? 'selected' : '' }}>دينار أردني</option>
        </select>

        <!-- Submit Button -->
        <button type="submit" class="btn-login">
            انشاء حساب
        </button>
    </div>
    </form>
</div>

@endsection
