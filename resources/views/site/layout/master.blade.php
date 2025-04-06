<!DOCTYPE html>
<html class="no-js" lang="{{ \Config::get('app.locale') == 'en' ? 'en' : 'ar' }}"
    dir="{{ \Config::get('app.locale') == 'en' ? 'ltr' : 'rtl' }}">

<head>
    
@include('site.layout.head')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@include('components.head-script')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<style>
    .search-icon svg {
        height: 25px;
        width: 35px;
        fill: #d4a017;
        margin-left: 12px;
        position: absolute;
        top: 6px;
        left: 9px;
        z-index: 999;
    }

    .search-icon form {
        position: absolute;
        top: 0;
        left: 0;
        /* width: 0; */
    }

    .search-icon {
        position: relative;
        height: 35px;
        width: 250px;
    }

    .search-icon form * {
        height: 35px;
        margin: 0;
        width: 45px;
        font-size: 0;
        margin-left: 15px;
        border-radius: 15px;
        border-color: #c4962d;
        transition: all 0.5s;
    }

    input.form-control.search-input.open {
        width: 250px;
        font-size: 12px;
    }

    .pro-imags.slick-initialized.slick-slider {
    max-width: 100%;
}

.pro-imags-nav .swiper-slide {
    padding: 15px;
}
 @if (strtolower(getLang()) == 'ar')
.form-select {
    background-position: 20px;
}
@endif

.cat-item {
    position: relative;
}

.cat-title {
    position: absolute;
    top: 0px;
    bottom: 5px;
    left: 25px;
    right: 25px;
    background: #00000059;
    border: 2px solid #c4962d;
    color: #ffffff;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    transition: all 0.3s;
    opacity: 0;
}

.cat-item:hover .cat-title {
    opacity: 1;
}

img{
    border-radius: 5px
}

body {
    /* overflow-x: hidden; */
}
</style>

@yield('css')
</head>


<body>

    @include('site.layout.header')


    @yield('content')


    <a href="{{ route('cart.view_cart') }}">
        <div class="float-cart">
            <div class="cart-icon">
                <i class="fa fa-shopping-cart"></i>
                <span class="cart-count ">{{ \App\Services\CartService::getCount() }}</span>
            </div>
            <span class="cart-add">
                تم اضافه حلوياتك هنا
            </span>
        </div>
    </a>


    @include('site.layout.footer')




    <form style='display: none;' id='delete-form' action="" method="post">
        @csrf
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</body>

@include('site.layout.footer-scripts')
@yield('scripts')
<script>
    function update(id) {

        var zone = $("#zone_" + id).attr('att');
        var phone = $("#phone_" + id).html();
        var title = $("#title_" + id).html();

        var name = $("#name_" + id).html();
        var shipping_info = $("#shipping_info_text_" + id).html();
        $('#zone option').prop('selected', false);
        $('#zone option').eq(zone - 1).prop('selected', true);
        $('#id_hidden').val(id)
        $('#phone').val(phone)
        $('#title').val(title)
        $('#name').val(name)
        $('#shipping_info_text').val(shipping_info)
        $('#newAddressModal').modal('show');
    }

    function newAddressModalFun() {
        $('#id_hidden').val('')
        $('#phone').val('')
        $('#title').val('')
        $('#name').val('')
        $('#shipping_info_text').val('')
        $('#newAddressModal').modal('show');
    }

    function nextFun() {

        var _href = $("input[name='address_id']:checked").attr('_href');
        if (_href != undefined) {
            window.location.href = _href;
        } else {
            toastr.error("@langucw('the address must be specified')")
        }

    }

    $(".personal_delivery").on('change', function(e) {
        if ($(this).attr('id') == 'delivery2') {
            $('#zone_personal').prop('disabled', true);
            $("#shipping_info").show();
            $("#personal_delivery").hide()
        } else {
            $('#zone_personal').prop('disabled', false);
            $("#personal_delivery").show();
            $("#shipping_info").hide()
        }
    });

    $("#Layer_1").on('click', function(e) {
        $('.search-input').toggleClass('open')
    });

    
</script>


</html>
