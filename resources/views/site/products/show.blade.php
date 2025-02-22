@extends('site.layout.master')

@section('title')
    {{ trans('general.products') }}
@endsection

@section('css')
    <style>
        .carousel-item img {
            width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('home') }}">@langucw('home')</a></li>
    <li><a href="{{ route('products.index') }}">@langucw('Product')</a></li>
    <li>{{ $product->getTitle() }}</li>
@endsection

@section('content')
    <div class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="product-images col-md-6">
                    <div class="pro-imags">


                        @foreach ($product->getMedia('products') as $index => $image)
                            <div class="swiper-slide">
                                <img src="{{ $image->getUrl() }}" alt="Image" />
                            </div>
                        @endforeach


                    </div>


                    <div class="pro-imags-nav" style="width: 50%">


                        @foreach ($product->getMedia('products') as $index => $image)
                            <div class="">
                                <img src="{{ $image->getUrl() }}" alt="Image"  />
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="product-details col-md-6">
                    <h1>{{ $product->getTitle() }}</h1>
                    <div class="price">
                        <span class="d-price" data-price="{{ $product->price() }}"></span>
                        <span class="d-price-v">{{ $product->price() }}</span> {{ $genralSetting->getCurrency() }}
                    </div>
                    <p>{!! $product->Description !!}</p>
                    @php
                        $options = $product->optionDetil->groupBy('POptID');
                    @endphp
                    @if (count($options))
                        @include('components.product-option-detil', ['options' => $options])
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="note" class="required">@langucw('notes')</label>
                            <input class="form-control" type="text" id="note" name="note" value=""
                                placeholder="@langucw('notes')">
                        </div>
                    </div>

                    @include('components.product-special-image')

                    <div class="add-to-cart-div">
                        <div class="row">
                            <div class="col-md-2">
                                @include('components.btn-number', ['id' => $product->id, 'quantity' => 1])
                            </div>
                            <div class="col-md-10">
                                <button class="add-to-cart-btn" href="javaScript:void(0)"
                                    onclick="addToCart({{ $product->id }})">
                                    أضف للسلة
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let uploadedDocumentMap = {};
        Dropzone.options.productDropzone = {
            url: '{{ route('cart.storeMedia') }}',
            maxFilesize: 10, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.txt,.docx,.doc,.pdf',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" id="productImage" name="image" value="' + response.name +
                    '">')
            },
            removedfile: function(file) {
                file.previewElement.remove();
                let name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $('form').find('input[name="image"][value="' + name + '"]').remove();
            },
            init: function() {},
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        $('input[name=qty]').change(function() {
            var quy = $(this).val();
            var price = $(".d-price").attr('data-price');
            $('.d-price-v').html(price * quy);
        });

        $('#OptID').change(function() {
            var quy = $('input[name=qty]').val();
            var price = $('#OptID option:selected').data('price');
            var id = $('#OptID option:selected').val();

            $(".d-price").attr('data-price', price);
            $('.d-price-v').html(price * quy);
            $('small').hide();
            $('#small-' + id).show();
        });
    </script>
@endsection
