@extends('site.layout.master')
@section('title', 'الكتالوج')
@section('content')
    <!DOCTYPE html>
    <html dir="rtl" lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>كتالوج الكيك</title>
        <style>
         

            .catalog-title {
                color: #C4962D;
                margin-bottom: 30px;
                font-size: 24px;
                font-weight: normal;
            }

            .slider-container {
                position: relative;
                max-width: 600px;
                width: 100%;
                padding: 20px;
                background: linear-gradient(145deg, #e8e8e8, #ffffff); 
                border-radius: 15px;
                box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.1),
                            -10px -10px 15px rgba(255, 255, 255, 0.7);
                            margin:auto;
            }

            .slider-image {
                width: 100%;
                height: auto;
                border-radius: 8px;
                display: none;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2),
                            0 6px 20px rgba(0, 0, 0, 0.19);
                border: 10px solid #f4f4f4; 
                background-color: #fff; 
            }

            .slider-image.active {
                display: block;
            }

            .nav-button {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background-color: rgba(255, 255, 255, 0.8);
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                color: #666;
            }

            .prev {
                left: 10px;
            }

            .next {
                right: 10px;
            }

            .dots-container {
                display: flex;
                justify-content: center;
                gap: 8px;
                margin-top: 20px;
            }

            .dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background-color: #ccc;
                cursor: pointer;
            }

            .dot.active {
                background-color: #666;
            }
        </style>
    </head>
    <body>
        <h1 class="catalog-title" style="text-align:center;padding:50px;">كتالوج الكيك</h1>
        
        <div class="slider-container">
            <img src="{{ asset('asset-files/imgs/d5390461-a5d2-4e41-b0da-cac1d919665c.jfif') }}" alt="كيك شوكولاتة" class="slider-image active">
            <img src="{{ asset('asset-files/imgs/ed23b6ae-3394-4fcf-b30b-74aa1d25e4e9.jfif') }}" alt="كيك فانيليا" class="slider-image">
            <img src="{{ asset('asset-files/imgs/Simple and Creative Birthday Cake Decorating Ideas You Can Try at Home.jfif') }}" alt="كيك فراولة" class="slider-image">
            <img src="{{ asset('asset-files/imgs/download.jfif') }}" alt="كيك توت" class="slider-image">
            <img src="{{ asset('asset-files/imgs/b269fc0d-a0f4-46be-99ef-8e7b5f746ac1.jfif') }}" alt="كيك برتقال" class="slider-image">
            
            <button class="nav-button prev">❮</button>
            <button class="nav-button next">❯</button>
            
            <div class="dots-container">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
                <span class="dot" data-index="3"></span>
                <span class="dot" data-index="4"></span>
            </div>
        </div>

        <script>
            const images = document.querySelectorAll('.slider-image');
            const dots = document.querySelectorAll('.dot');
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');
            let currentIndex = 0;

            function updateSlider(index) {
                images.forEach((img, i) => {
                    img.classList.toggle('active', i === index);
                });
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                });
            }

            function showNextImage() {
                currentIndex = (currentIndex + 1) % images.length;
                updateSlider(currentIndex);
            }

            function showPrevImage() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateSlider(currentIndex);
            }

            nextButton.addEventListener('click', showNextImage);
            prevButton.addEventListener('click', showPrevImage);

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentIndex = index;
                    updateSlider(currentIndex);
                });
            });

            setInterval(showNextImage, 5000);
        </script>
    </body>
    </html>
@endsection
