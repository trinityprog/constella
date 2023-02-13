@foreach($data['attributes']->colors as $color => $prod_id)
    @php
        $c = App\Models\Color::where('abbr', $color)->first();
        if ($c) {
          $colorName = $c->getName();
          $colorStyle = $c->code;
        }else {
          $colorName = $color;
          $colorStyle = '#f5f5f5';
        }
    @endphp
    <a href="#" class="color-item"
       data-product-id="{{ $prod_id }}"
       data-cname="{{ $colorName }}"
       data-color="{{ $colorName }}"
       style="background: {{ $colorStyle }};"
    ></a>
@endforeach
