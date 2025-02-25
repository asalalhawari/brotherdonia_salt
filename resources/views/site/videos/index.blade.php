@extends('site.layout.master')

@section('title', __('Videos'))

@section('content')
<div class="container">
    <h2 class="title" style="text-align: center">{{ __('Private Videos') }}</h2>
    <div class="videos-grid">
        @foreach($videos as $video)
            <div class="video-item">
                <iframe 
                    width="100%" 
                    height="100%" 
                    src="{{ $video->url }}" 
                    title="{{ $video->title }}" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        @endforeach
    </div>
</div>
@endsection
