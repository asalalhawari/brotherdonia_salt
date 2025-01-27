@extends('site.layout.master')
@section('title')
    @langucw('contact us')
@endsection
@section('css')
    <style>
       
    </style>
@endsection
@section('breadcrumb')
    <li><a href="{{ route('home') }}">@langucw('home')</a></li>
    <li> @langucw('contact us') </li>
@endsection
@section('content')
    <!-- Contact form section Start -->
    <div class="container">
        <h2>تواصل معنا</h2>
        <form method="POST" action="{{ route('contact_us.send') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="الاسم" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input type="tel" name="phone" placeholder="رقم الهاتف" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <textarea name="message" placeholder="اكتب رسالتك هنا ...">{{ old('message') }}</textarea>
            </div>
            <div class="buttons">
            <button type="submit" class="confirm">تأكيد</button>

                <button type="reset" class="cancel">إلغاء</button>
            </div>
        </form>
    </div>
    <!-- Contact form section End -->
@endsection
@section('scripts')
@endsection
