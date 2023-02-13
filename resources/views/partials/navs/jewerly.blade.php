<div class="big-holder">
    <a href="#" class="cat-link">{{ $category->getName() }}</a>
    <div class="big-dropdown {{ $category->slug }}">
        <div class="container flex space-between">
            <div class="unbordered flex">
                <img src="{{ url('i/products/'. $category->image) }}" alt="" class="cat-image-left">
                <div class="dif-cats">
                    <div class="flex">
                        @foreach($subCategories->whereIn('id', [4, 5]) as $subcategory)
                            @if($subcategory->menu->count())
                                <div class="cat">
                                    <p class="title">{{ $subcategory->getName() ?? '' }}</p>
                                    @foreach($subcategory->menu->take(10) as $menu)
                                        @if(!empty($menu->slug))
                                            <a class="cat-nav-link" href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $menu->slug]) }}">{{ $menu->getName() ?? '' }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => 'yuvelirnye-izdeliya']) }}" class="watch-all">{{ __('Смотреть все') }}</a>
                </div>
            </div>
            <div class="bordered">
                <div class="flex">
                    <div class="dif-cats">
                        <div class="flex">
                            <div class="cat">
                                <p class="title">{{ __('Бренды') }}</p>
                                @foreach($jewerlyBrands as $brand)
                                    <a href="{{ route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $brand]) }}" class="cat-nav-link">
                                        {{ $brand }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $category->slug]) }}" class="watch-all">{{ __('Все бренды') }}</a>
                    </div>
                    <div class="centered desktop">
                        <img src="{{ url('i/products/zhannga-sign-v2.png') }}" alt="" class="zk"> <br>
                        <img src="{{ url('i/products/jew-bril.jpg') }}" class="hk-34" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
