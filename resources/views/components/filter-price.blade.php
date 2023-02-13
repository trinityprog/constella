<div class="filter-block {{ (request()->has('price-min')) ? 'active' : '' }}">
    <p class="filter-name"><a href="#">{{ $type }} <span></span></a></p>

    <div class="price-filter toggle" style="{{ (request()->has('price-min')) ? 'display:block' : '' }}">
        @php
            $code = Cookie::has('currency') ? Cookie::get('currency') : 'kzt';
            $currency = \App\Models\Currency::where('code', strtoupper($code))->first()->symbol;
        @endphp

        <div class="price-inputs flex item-center space-between">
            <label for="price_from">
                <span>{{ __('от') }}</span>
                <input type="text" rel="price_from" @if(request()->has('price-min')) value="{{ str_replace([$currency, ' '], '', request()->input('price-min')) }}" @endif>
            </label>
            <span class="divider"></span>
            <label for="price_to">
                <span>{{ __('до') }}</span>
                <input type="text" rel="price_to" @if(request()->has('price-max')) value="{{ str_replace([$currency, ' '], '', request()->input('price-max')) }}" @endif >
            </label>
        </div>

        <div class="price-slider"
             @if($data['min'] > 0) data-step="{{ ($data['max'] / $data['min']) }}" @endif
             data-currency="{{ $currency }}"
             data-from="{{ ($data['min'] != $data['max']) ? $data['min'] : 0 }}"
             data-to="{{ $data['max'] }}">
        </div>
    </div>
</div>
