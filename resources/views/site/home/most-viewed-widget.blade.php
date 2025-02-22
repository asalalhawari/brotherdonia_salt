@php
    $bestSellers=app()->make(\App\Repositories\ItemRepository::class)->getMostViewedProducts();
    $currency=app()->make(\App\Repositories\GenralSettingRepository::class)->getCurrency();
@endphp
<div class="product-list mys">
    <h3 class="product-list__title">تسوق الان</h3>
    <div class="container">
        <div class="product- row">
            @foreach($bestSellers??[] as $index=>$product)
            <div class="col-md-3 mb-3">
                @include('site.home.product-type-3-widget')
            </div>
            @endforeach
        </div>
    </div>
</div>
