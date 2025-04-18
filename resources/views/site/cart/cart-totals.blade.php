<div class="col-lg-4 col-12 mb-30">
    <div class="cart-totals card" style=" border-radius: 10px;">
        <div class="cart-totals-inner p-3">
            <h4 class="title">@langucw('Cart Total')</h4>
            
            @php
                $total=app()->make(\App\Repositories\CartRepository::class)->getTotalPrice($carts??[]);
            @endphp
            <div class="total-cll">
                <span class="title">@langucw('Subtotal')</span>
                
                <span>{{$genralSetting->getCurrency()}}<span class="subtotal_amount">
                    {{(float)$total}}
                 </span></span>
            </div>

        </div>

        @if(auth()->user())
            <button type="button" onclick="nextRoute('{{Route('shipping_info.index')}}')" class="dropdown-item checkout-button p-2">@langucw('Checkout')</button>
        @else
            <a href="{{Route('login')}}" class="dropdown-item checkout-button p-2">@langucw('Login')</a>
        @endif
    </div>
</div>
