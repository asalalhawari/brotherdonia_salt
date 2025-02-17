@if(count($options)>0)
    @foreach($options as $optin)
        <div class=" mb-3">
            <div class="form-group">
                <label for="colorBy">{{$optin[0]->subOption->itemOption->getTitle()}}</label>
                <div class="select-wrapper">
                    <select att="{{$optin[0]->subOption->itemOption->id}}" id="OptID" name="OptID"
                            class="selectCom form-control w-100  ">
                        @foreach($optin as $item)
                            <option data-price="{{$item->AdditionalValue + $product->Price}}"  value="{{$item->id}}">
                                {{ \Config::get('app.locale') == 'en' ? $item->subOption['NameEN'] : $item->subOption['Name'] }}
                                
                                @if ($item->AdditionalValue > 0)
                                | + {{$item->AdditionalValue}}
                                @endif
                                </option>

                        @endforeach
                    </select>

                    @php
                        $i = 0;
                        $display = '';
                    @endphp

                    @foreach($optin as $item)
                    {{-- @dd($item) --}}
                    @php
                        $display =  $i == 0 ? 'display:block' : 'display:none';
                    @endphp
                    <small id="small-{{ $item->id }}" style="{{ $display }}">{{ $item->subOption['blob'] }}</small>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endif
