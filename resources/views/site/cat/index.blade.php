@php
 $mainCategories=app()->make(\App\Repositories\MainCategoriesRepository::class)->get();
@endphp
@extends('site.layout.master')
@section('title')
    {{ trans('general.products') }}
@endsection
@section('css')
@endsection
@section('breadcrumb')
    <li><a href="{{ route('home') }}">@langucw('home')</a></li>
    <li>@langucw('Product') </li>
@endsection
@section('content')
<div class="container mt-10 category-section">
    <h1 class="section-name text-center mt-3 mb-3 mainshopteam">{{ __('Shop By Category') }}</h1>
    <div class="row">
        <div class="col-12 row">
            @foreach ($mainCategories as $item) 
            <a data-aos="fade-down" href="{{ route('products.index', $item->id) }}" class="col-md-4 col-12 cat-item">
                <div class=" aaa item position-relative d-flex align-items-center justify-content-between ">
                    <img src="{{$item->getFirstMediaUrl('categories')??''}}" class="d-flex m-auto img-fluid" />
                </div>
                <h3 class="mt-3 text-center">{{ $item->getName() }}</h3>
            </a>
            @endforeach
            
         
        </div>

    </div>
</div>

@endsection