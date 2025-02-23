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
    <div class="container" style="max-width: 850px; margin: auto; padding: 30px;  border-radius: 10px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #C4962D; font-size: 26px;">@langucw('تواصل معنا')</h2>
        <form method="POST" class="contact-form" action="{{ route('contact_us.send') }}">
            @csrf
            <div class="form-group" style="margin-bottom: 18px;">
                <input type="text" name="name" placeholder="@langucw('الاسم')" value="{{ old('name') }}" 
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl;">
            </div>
            <div class="form-group" style="margin-bottom: 18px;">
                <input type="email" name="email" placeholder="@langucw('البريد الإلكتروني')" value="{{ old('email') }}" 
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl;">
            </div>
            <div class="form-group" style="margin-bottom: 18px;">
                <input type="tel" name="phone" placeholder="@langucw('رقم الهاتف')" value="{{ old('phone') }}" 
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl;">
            </div>
            <div class="form-group" style="margin-bottom: 22px;">
                <textarea name="message" placeholder="@langucw('اكتب رسالتك هنا ...')" 
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl; height: 150px;">{{ old('message') }}</textarea>
            </div>
            <div class="buttons" style="display: flex; justify-content: space-between; align-items: center;">
                <button type="submit" class="confirm" 
                    style="background-color: #C4962D; color: white; padding: 14px 30px; border: none; 
                    border-radius: 8px; cursor: pointer; font-size: 20px; font-weight: 600;">
                    @langucw('تأكيد')
                </button>
                <button type="reset" class="cancel" 
                    style="background-color: #ccc; color: black; padding: 14px 30px; border: none; 
                    border-radius: 8px; cursor: pointer; font-size: 20px;">
                    @langucw('إلغاء')
                </button>
            </div>
        </form>
    </div>
    <!-- Contact form section End -->
@endsection
@section('scripts')
@endsection
