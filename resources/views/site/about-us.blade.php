@extends('site.layout.master')

@section('content')
<div class="container mt-5">
    <section class="section">
        <h2 class="about-h2 mb-5">@lang('About Us')</h2>
        <div class="about-container">
            <img src="{{ asset('asset-files/imgs/Mince-pie-cheesecake-da1c314 3.png') }}" alt="@lang('Cheesecake')" class="about-image mb-5">
            <div class="text-content">
                @lang('In our shop, we offer you a unique experience with a variety of the finest types of cakes and sweets made by expert hands using high-quality ingredients. We ensure to provide fresh cakes with unforgettable taste to suit all special and family occasions. Whether you are looking for cakes for a special celebration or just enjoying a dish of sweets, we are here to meet your needs in the best possible way. We believe that every moment deserves to be sweeter with a touch of delicious dessert.')
            </div>
        </div>
    </section>
    
    <section class="section">
        {{-- <h2 class="about-h2 right">@lang('Address here')</h2> --}}
        <div class="location-container">
            <div class="text-content">
                @lang('In our shop, we offer you a unique experience with a variety of the finest types of cakes and sweets made by expert hands using high-quality ingredients. We ensure to provide fresh cakes with unforgettable taste to suit all special and family occasions. Whether you are looking for cakes for a special celebration or just enjoying a dish of sweets, we are here to meet your needs in the best possible way. We believe that every moment deserves to be sweeter with a touch of delicious dessert.')
            </div>
            <img src="{{ asset('asset-files/imgs/image (12).png') }}" alt="@lang('Bakery')" class="location-image">
        </div>
    </section>
</div>  
@endsection
