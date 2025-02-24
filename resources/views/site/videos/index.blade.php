@extends('site.layout.master')
@section('title', __('Videos'))
@section('content')
<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Private Videos') }}</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .title {
            text-align: right;
            margin-bottom: 20px;
            color: #C4962D;
            font-size: 1.5rem;
        }

        .videos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .video-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            aspect-ratio: 16/10;
        }

        .video-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.4));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .play-button {
            width: 50px;
            height: 50px;
            background-color: rgba(255,255,255,0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .play-button::after {
            content: '';
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 10px 0 10px 16px;
            border-color: transparent transparent transparent #000;
            margin-left: 4px;
        }

        @media (max-width: 600px) {
            .videos-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title" style="text-align: center">{{ __('Private Videos') }}</h2>
        <div class="videos-grid">
            <div class="video-item">
                <img src="{{ asset('images/download.jfif') }}" alt="{{ __('Layered Sweets') }}">
                <div class="video-overlay">
                    <div class="play-button"></div>
                </div>
            </div>
            <div class="video-item">
                <img src="{{ asset('images/d5390461-a5d2-4e41-b0da-cac1d919665c.jfif') }}" alt="{{ __('Chocolate Cake') }}">
                <div class="video-overlay">
                    <div class="play-button"></div>
                </div>
            </div>
            <div class="video-item">
                <img src="{{ asset('images/Simple and Creative Birthday Cake Decorating Ideas You Can Try at Home.jfif') }}" alt="{{ __('Creamy Dessert') }}">
                <div class="video-overlay">
                    <div class="play-button"></div>
                </div>
            </div>
            <div class="video-item">
                <img src="{{ asset('images/ed23b6ae-3394-4fcf-b30b-74aa1d25e4e9.jfif') }}" alt="{{ __('Sugar-coated Sweets') }}">
                <div class="video-overlay">
                    <div class="play-button"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
