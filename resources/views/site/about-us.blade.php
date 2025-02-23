@extends('site.layout.master')

@section('content')
<div class="container">
    <section class="section">
        <h2 class="about-h2">@lang('من نحن')</h2>
        <div class="about-container">
            <img src="{{ asset('asset-files/imgs/Mince-pie-cheesecake-da1c314 3.png') }}" alt="@lang('تشيز كيك')" class="about-image">
            <div class="text-content">
                @lang('في محلنا، نقدم لك تجربة فريدة من نوعها مع مجموعة متنوعة من أطيب أنواع الكيك والحلويات المصنوعة بأيدي خبيرة باستخدام مكونات عالية الجودة. نحن نحرص على تقديم كيكات طازجة وذات مذاق لا يُنسى لتناسب جميع المناسبات الخاصة والعائلية. سواء كنت تبحث عن كيكات لاحتفال مميز أو لمجرد الاستمتاع بطبق من الحلا، فنحن هنا لنلبي احتياجاتك بأفضل طريقة ممكنة. نحن نؤمن بأن كل لحظة تستحق أن تكون أحلى مع لمسة من الحلوى الشهية')
            </div>
        </div>
    </section>
    
    <section class="section">
        <h2 class="about-h2 right">@lang('عنوان هنا')</h2>
        <div class="location-container">
            <div class="text-content">
                @lang('في محلنا، نقدم لك تجربة فريدة من نوعها مع مجموعة متنوعة من أطيب أنواع الكيك والحلويات المصنوعة بأيدي خبيرة باستخدام مكونات عالية الجودة. نحن نحرص على تقديم كيكات طازجة وذات مذاق لا يُنسى لتناسب جميع المناسبات الخاصة والعائلية. سواء كنت تبحث عن كيكات لاحتفال مميز أو لمجرد الاستمتاع بطبق من الحلا، فنحن هنا لنلبي احتياجاتك بأفضل طريقة ممكنة. نحن نؤمن بأن كل لحظة تستحق أن تكون أحلى مع لمسة من الحلوى الشهية')
            </div>
            <img src="{{ asset('asset-files/imgs/image (12).png') }}" alt="@lang('المخبز')" class="location-image">
        </div>
    </section>
    
   
</div>
@endsection
