<div class="big-holder">
    <a href="#" class="cat-link">{{ __('Бренды') }}</a>
    <div class="big-dropdown brands-nav">
        <div class="container flex space-between">
            <div class="unbordered flex">
                <img src="{{ url('i/products/brands-1.jpg') }}" alt="Ювелирные бренды" class="cat-image-left">
                <div class="dif-cats">
                    <div class="flex">
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
                </div>
            </div>
            <div class="flex item-center desktop">
                <div class="centered brand-img">
                    <img src="{{ url('i/products/brands-2.jpg') }}" />
                </div>
            </div>
        </div>
    </div>
</div>
