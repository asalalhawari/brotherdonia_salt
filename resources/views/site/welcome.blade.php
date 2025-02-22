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
                        {{-- @foreach ($slider->getMedia('slider') as $image) --}}
                        <img class="d-block w-100" src="{{ asset($slider->getFirstMediaUrl('slider', 'full')) }}"
                            alt="Slide Image">
                        {{-- @endforeach --}}
                        <div class="carousel-caption d-none d-md-block">
                            <img src="{{ asset('asset-files/imgs/slider/logo.gif') }}" alt="" class="slider-logo">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->url }}</p>
                            <a href="{{ route('mainshop') }}" class="slider-btn btn btn-pink">تسوق الآن</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="intro">
        <span data-aos="fade-up">
            لا تضيع مناسبة بنوصلك وين ما كنت
        </span>
    </section>

    <section class="about">
        <div class="container">
            <div class="row ccenter">
                <div class="col-12 col-md-6">
                    @php
                        $about = \App\Models\GeneralSetting::find(1);
                    @endphp
                    <div class="row">
                        <div class="col-6 c-align" data-aos="fade-up">
                            <img src="{{ asset($about->getFirstMediaUrl('about_image_one','full')) }}" class="img-fluid" />
                        </div>
                        <div class="col-6" data-aos="fade-down">
                            <img src="{{ asset($about->getFirstMediaUrl('about_image_tow','full')) }}" class="img-fluid" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6" data-aos="fade-right">
                    <h3 class="outheadein">
                        <span class="hh"></span>
                        ماذا عنا
                    </h3>

                    
                    <p>
                       {{ $about->about}}
                    </p>
                    <a href="{{ route('mainshop') }}" class="slider-btn btn btn-pink">تسوق الآن</a>
                </div>
            </div>
        </div>
    </section>


    <section class="cats">
        <div class="container">
            <h3 class="outheadein">الاقسام</h3>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">داخل الاردن</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">خارج الاردن</button>
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
                                    <div
                                        class=" aaa item position-relative d-flex align-items-center justify-content-between ">
                                        <img src="{{ $item->getFirstMediaUrl('categories') ?? '' }}"
                                            class="d-flex m-auto img-fluid" />
                                    </div>
                                    <h3 class="mt-3 text-center cat-title">{{ $item->Name }}</h3>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="maincat">
                        @php
                            $mainCategories = app()
                                ->make(\App\Repositories\MainCategoriesRepository::class)
                                ->getByType('outside');

                        @endphp
                        <div class="row">
                            @foreach ($mainCategories as $item)
                                <a data-aos="fade-down"
                                    href="{{ route('products.index', ['rtype' => $item->rtype, 'entity' => $item->id]) }}"
                                    class="col-md-4 cat-item">
                                    <div
                                        class=" aaa item position-relative d-flex align-items-center justify-content-between ">
                                        <img src="{{ $item->getFirstMediaUrl('categories') ?? '' }}"
                                            class="d-flex m-auto img-fluid" />
                                    </div>
                                    <h3 class="mt-3 text-center cat-title">{{ $item->Name }}</h3>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>



        </div>
    </section>


    @include('site.home.most-viewed-widget')

    <section class="cards">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="homecars">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('asset-files/imgs/cards/1.png') }}" class="img-fluid" />
                            </div>
                            <div class="col-10">
                                <h5>
                                    {{ $about->title1 }}
                                </h5>
                                <span>
                                    {{ $about->des1 }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="homecars">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('asset-files/imgs/cards/2.png') }}" class="img-fluid" />
                            </div>
                            <div class="col-10">
                                <h5>{{ $about->title2 }}</h5>
                                <span>
                                    {{ $about->des2 }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="homecars">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('asset-files/imgs/cards/3.png') }}" class="img-fluid" />
                            </div>
                            <div class="col-10">
                                <h5>{{ $about->title3 }}</h5>
                                <span>
                                    {{ $about->des2 }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="download">
        <div class="container">
            <h3 class="">تحميل التطبيق</h3>
            <div class="dlinks">
                <img src="{{ asset('asset-files/imgs/a.png') }}" />
                <img src="{{ asset('asset-files/imgs/g.png') }}" />
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
