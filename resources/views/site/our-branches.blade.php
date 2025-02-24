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
    <h2>{{ __('Branches') }}</h2>
    @foreach($branches??[] as $index=>$branche)
    <div class="branch-card">
        <img src="{{ asset( $branche->getFirstMediaUrl('branche','full') ) }}" alt="@lang('Branch 1')">
        <div class="branch-details">
            {{-- <h3>@lang('Branch Name')</h3> --}}
            <p><i class="fas fa-map-marker-alt"></i> {{$branche->AddresEn}}</p>
            <p><i class="fas fa-phone"></i> {{$branche->Phone}}</p>
            <p><i class="fas fa-clock"></i> @lang('Working Hours'):</p>
            <p>@lang('From 9 AM to 5 PM')</p>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('scripts')  

@endsection
