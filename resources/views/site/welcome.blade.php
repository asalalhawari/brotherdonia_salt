@extends('site.layout.master')
@section('title')
@endsection
@section('css')
@endsection
@section('breadcrumb')
@endsection
@php $home='home'; @endphp
@section('content')
    <section class="home-slider">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset($slider->getFirstMediaUrl('slider', 'full')) }}"
                            alt="{{ __('Slide Image') }}">
                        <div class="carousel-caption d-none d-md-block">
                            <img src="{{ asset('asset-files/imgs/slider/logo.gif') }}" alt="" class="slider-logo">
                            <h1>{{ __($slider->title) }}</h1>
                            <p>{{ __($slider->url) }}</p>
                            <a href="{{ route('mainshop') }}" class="slider-btn btn btn-pink">{{ __('shop now') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('Previous') }}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('Next') }}</span>
            </button>
        </div>
    </section>

    <section class="intro">
        <span data-aos="fade-up">
            {{ __('dont miss an occasion') }}
        </span>
    </section>

    <section class="about">
        <div class="container">
            <div class="row ccenter">
                <div class="col-12 col-md-6">
                    @php
                        $about = \App\Models\GeneralSetting::find(1);
                    @endphp
<style>
    .tall-img {
        height: 100%;  /* عرض الصورة بالطول الكامل */
        object-fit: cover;  
        width: 100%; 
    }

    .image-container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .p-2 img {
        width: 400%;
        height: 100%;  
        object-fit: cover;
    }

    .text-container {
        text-align: center;
        margin-top: 30px; 
    }

    .col-md-3 {
        height: 100%; 
    }

    .col-md-6 {
        display: flex;
        justify-content: space-between;
    }

  
    .tall-img-left, .tall-img-right {
        height: 250%;  
        object-fit: cover;
    }

    .center-img {
        width: 200%;  
        object-fit: cover;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-3" data-aos="fade-right">
            <div class="image-container">
                <img src="{{ asset($about->getFirstMediaUrl('about_image_one','full')) }}" class="img-fluid tall-img-left" />
            </div>
        </div>

        <div class="col-md-6 d-flex flex-wrap justify-content-between">
            <div class="col-6 p-2" data-aos="fade-up">
                <img src="{{ asset($about->getFirstMediaUrl('about_image_two','full')) }}" class="img-fluid center-img" />
            </div>
            <div class="col-6 p-2" data-aos="fade-down">
                <img src="{{ asset($about->getFirstMediaUrl('about_image_three','full')) }}" class="img-fluid center-img" />
            </div>
        </div>

        <div class="col-md-3" data-aos="fade-left">
            <div class="image-container">
                <img src="{{ asset($about->getFirstMediaUrl('about_image_four','full')) }}" class="img-fluid tall-img-right" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-container" data-aos="fade-right">
            <h3 class="outheadein">
                <span class="hh"></span>
                {{ __('About Us') }}
            </h3>
            <p>
                {{ __($about->about) }}
            </p>
            <a href="{{ route('mainshop') }}" class="slider-btn btn btn-pink">{{ __('Shop Now') }}</a>
        </div>
    </div>
</div>


    </section>

    <section class="cats">
        <div class="container">
            <h3 class="outheadein">{{ __('Categories') }}</h3>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">{{ __('Inside Jordan') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">{{ __('Outside Jordan') }}</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="maincat">
                        @php
                            $mainCategories = app()
                                ->make(\App\Repositories\MainCategoriesRepository::class)
                                ->getByType('inside');
                        @endphp
                        <div class="row">
                            @foreach ($mainCategories as $item)
                                <a data-aos="fade-down"
                                    href="{{ route('products.index', ['rtype' => $item->rtype, 'entity' => $item->id]) }}"
                                    class="col-md-4 cat-item">
                                    <div class="aaa item position-relative d-flex align-items-center justify-content-between ">
                                        <img src="{{ $item->getFirstMediaUrl('categories') ?? '' }}"
                                            class="d-flex m-auto img-fluid" />
                                    </div>
                                    <h3 class="mt-3 text-center cat-title">{{ __($item->Name) }}</h3>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @include('site.home.most-viewed-widget')

    <section class="download">
        <div class="container">
            <h3 class="">{{ __('Download App') }}</h3>
            <div class="dlinks">
                <img src="{{ asset('asset-files/imgs/a.png') }}" />
                <img src="{{ asset('asset-files/imgs/g.png') }}" />
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
