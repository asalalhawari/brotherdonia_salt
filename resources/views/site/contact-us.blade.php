@extends('site.layout.master')
@section('title')
    @langucw('Contact Us')
@endsection
@section('css')
    <style>

    </style>
@endsection
@section('breadcrumb')
    <li><a href="{{ route('home') }}">@langucw('Home')</a></li>
    <li> @langucw('Contact Us') </li>
@endsection
@section('content')
    <!-- Contact form section Start -->
    <div class="container" style="max-width: 850px; margin: auto; padding: 30px;  border-radius: 10px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #C4962D; font-size: 26px;">@langucw('Contact Us')</h2>
        <form method="POST" class="contact-form" action="{{ route('contact_us.send') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="margin-bottom: 18px;">
                <input type="text" name="name" placeholder="@langucw('Name')" value="{{ old('name') }}" 
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl;">
            </div>
            <div class="form-group" style="margin-bottom: 18px;">
                <input type="email" name="email" placeholder="@langucw('Email')" value="{{ old('email') }}" 
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl;">
            </div>
            <div class="form-group" style="margin-bottom: 18px;">
                <input type="tel" name="phone" placeholder="@langucw('Phone Number')" value="{{ old('phone') }}" 
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl;">
            </div>
            <div class="form-group" style="margin-bottom: 22px;">
                <textarea name="message" placeholder="@langucw('Write your message here ...')" 
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl; height: 150px;">{{ old('message') }}</textarea>
            </div>
            <!-- Complaint Image Upload -->
            <div class="form-group" style="margin-bottom: 18px;">
                <label for="complaint_image" style="font-size: 20px; color: #C4962D;">@langucw('Upload Complaint Image')</label>
                <input type="file" name="complaint_image" id="complaint_image" accept="image/*"
                    style="width: 100%; padding: 14px; border: 2px solid #C4962D; border-radius: 8px; font-size: 20px; outline: none; text-align: right; direction: rtl;">
            </div>
            <div class="buttons" style="display: flex; justify-content: space-between; align-items: center;">
                <button type="submit" class="confirm" 
                    style="background-color: #C4962D; color: white; padding: 14px 30px; border: none; 
                    border-radius: 8px; cursor: pointer; font-size: 20px; font-weight: 600;">
                    @langucw('Confirm')
                </button>
                <button type="reset" class="cancel" 
                    style="background-color: #ccc; color: black; padding: 14px 30px; border: none; 
                    border-radius: 8px; cursor: pointer; font-size: 20px;">
                    @langucw('Cancel')
                </button>
            </div>
        </form>
    </div>
    <!-- Contact form section End -->
@endsection
@section('scripts')
@endsection
