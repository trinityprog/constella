<div class="jewerly-menu slidedown-element nav-item">
    <div class="cat">
        <div class="cat-item">
            @foreach($brands as $brand)
                <a href="{{ route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $brand]) }}" class="cat-nav-link">
                    {{ $brand }}
                </a>
            @endforeach
        </div>
    </div>
</div>
