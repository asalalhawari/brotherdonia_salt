@extends('site.layout.master',['show_slider'=>false,'title'=>@langucw('our branches'),'color'=>'blue'])

@section('title')
    @langucw('our branches')
@endsection

@section('css')

@endsection

@section('breadcrumb')

@endsection

@section('content')
<div class="branches">
    <h2>@lang('الفروع')</h2>
    @foreach($branches??[] as $index=>$branche)
    <div class="branch-card">
        <img src="{{ asset( $branche->getFirstMediaUrl('branche','full') ) }}" alt="@lang('فرع 1')">
        <div class="branch-details">
            {{-- <h3>@lang('اسم الفرع')</h3> --}}
            <p><i class="fas fa-map-marker-alt"></i> {{$branche->AddresAr}}</p>
            <p><i class="fas fa-phone"></i> {{$branche->Phone}}</p>
            <p><i class="fas fa-clock"></i> @lang('مواعيد العمل'):</p>
            <p>@lang('من 9 صباحاً وحتى الـ 5 مساءً')</p>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('scripts')

@endsection
