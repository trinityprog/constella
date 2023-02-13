@foreach($data['attributes']->sizes as $size => $prod_id)
    <a href="#"
       data-product-id="{{ $prod_id }}"
       data-size="{{ $size }}"
       data-sname="{{ $size }}"
       class="size-item">{{ $size }}
    </a>
@endforeach
