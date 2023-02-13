<div class="big-holder">
    <a href="#" class="cat-link">{{ __('Новые коллекции') }}</a>
    <div class="big-dropdown brands-nav">
        <div class="container flex space-between">
            <div class="unbordered flex">
                <img src="{{ url('i/products/brands-1.jpg') }}" alt="Ювелирные бренды" class="cat-image-left">
                <div class="dif-cats">
                    <div class="flex">
                        <div class="cat">
                            <div class="cat-item">
                                @foreach(\App\Models\ProductCharacteristic::query()->whereNotNull('collection')->latest()->take(33)->get('collection')->unique('collection')->pluck('collection')->toArray() as $newCollections)
                                    <a href="{{ route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $newCollections]) }}" class="cat-nav-link">
                                        {{ $newCollections }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex item-center desktop">
                <div class="centered">
                    <img src="{{ url('i/products/brands-2.jpg') }}" />
                </div>
            </div>
        </div>
    </div>
</div>
