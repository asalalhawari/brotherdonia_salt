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
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        @foreach ($slider->getMedia('slider') as $image)
                            <img class="d-block w-100" src="{{ asset('storage/'.$image->getUrl('full')) }}" alt="Slide Image">
                        @endforeach
                        <div class="carousel-caption d-none d-md-block">
                            <img src="{{ asset('asset-files/imgs/slider/logo.gif') }}" alt="" class="slider-logo">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->url }}</p>
                            <a href="{{ route('mainshop') }}" class="slider-btn btn btn-pink">تسوق الآن</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
                    <div class="row">
                        <div class="col-6 c-align" data-aos="fade-up">
                            <img src="{{ asset('asset-files/imgs/about/1.png') }}" class="img-fluid" />
                        </div>
                        <div class="col-6" data-aos="fade-down">
                            <img src="{{ asset('asset-files/imgs/about/2.png') }}" class="img-fluid" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6" data-aos="fade-right">
                    <h3 class="outheadein">
                        <span class="hh"></span>
                        ماذا عنا
                    </h3>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث
                        يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق.
                    </p>
                    <a href="{{ route('mainshop') }}" class="slider-btn btn btn-pink">تسوق الآن</a>
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
                                <h5>توصيل مجاني</h5>
                                <span>أستمتع بالتوصيل السريع والمجاني</span>
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
                                <h5>منتجات فريش</h5>
                                <span>جميع المنتجات فريش</span>
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
                                <h5>مصنوع بحب</h5>
                                <span>أستمتع بالتوصيل السريع والمجاني</span>
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
