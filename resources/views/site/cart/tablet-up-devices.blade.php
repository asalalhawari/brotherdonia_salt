@if(count($carts) > 0)
    <table id="table" class="ourcart">
        <thead>
        <tr class="no-bor-top">
            <th scope="col" width="30">&nbsp;</th>

            <th scope="col">@lang('Image')</th>
            <th scope="col">@lang('Item Name')</th>
            <th scope="col">@lang('Price')</th>
            <th scope="col">@lang('Quantity')</th>
            <th scope="col">@lang('Total')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($carts ?? [] as $index => $cart)
            @if($cart->item)
                <tr>
                    <td>
                        <span style="cursor:pointer" onclick="deleteItem('{{ route('cart.delete', $cart) }}')">x</span>
                    </td>
                   
                    <td>
                        <div class="">
                            @if ($cart->item->getFirstMediaUrl('products', 'full'))
                                <img alt="cupcake" height="200" src="{{ asset($cart->item->getFirstMediaUrl('products', 'full')) }}"
                                     style="width: 70px !important;height:auto" />
                            @else
                                <img alt="cupcake" src="{{ asset('place.png') }}"
                                     style="width: 70px !important;height:auto" />
                            @endif
                        </div>
                    </td>
                    <td>
                        {{$cart->item->getTitle()}}
                        @if($cart->optionDetil())
                            @foreach($cart->optionDetil()->get() ?? [] as $option)
                                <br>
                                <span>{{$option->subOption->getTitle()}} </span>
                            @endforeach
                        @endif
                    </td>
                    @php
                        $price = $cart->price;
                    @endphp
                    <td>
                        <div class="price-product price-{{$cart->id}}">{{$price}}</div>
                    </td>
                    <td>
                        @include('components.btn-number', ['id' => $cart->id, 'quantity' => $cart->quantity])
                    </td>
                    <td>
                        <span class="total total_{{$cart->id}}">{{ ($price * $cart->quantity) }}</span> {{$genralSetting->getCurrency()}}
                    </td>

                    @if($cart->getFirstMediaUrl('images', 'large'))
                        <a class="img-product" target="_blank"
                           href="{{ asset($cart->getFirstMediaUrl('images', 'large')) ?? '' }}?v={{ now() }}">
                            <img width="100px" height="100px" class="full-image"
                                 src="{{ asset($cart->getFirstMediaUrl('images', 'small')) ?? '' }}?v={{ now() }}">
                        </a>
                    @endif
                </td>
            @endif
        @endforeach
        </tbody>
    </table>
@endif
