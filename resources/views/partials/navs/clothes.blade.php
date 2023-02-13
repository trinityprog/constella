<div class="big-holder">
    <a href="#" class="cat-link">{{ $category->getName() }}</a>
    <div class="big-dropdown {{ $category->slug }}">
        <div class="container flex space-between">
            <div class="unbordered flex">
                @if((session('sex') === 'female') ? 'active' : '')
                    <img src="{{ url('i/products/'. $category->image) }}" alt="" class="cat-image-left">
                @elseif((session('sex') === 'male') ? 'active' : '')
                    <img src="{{ url('i/products/'. $category->image) }}" alt="" class="cat-image-left">
                @else((session('sex') === 'kids') ? 'active' : '')
                    <img src="{{ asset('i/kids-1.png') }}" alt="" class="cat-image-left">
                @endif
                <div class="dif-cats">
                    <div class="flex">
                        @foreach($subCategories->whereIn('id', [3, 8, 9, 10]) as $subcategory)
                            @if($subcategory->menu->count())
                                <div class="cat">
                                    <p class="title">{{  $subcategory->getName() ?? '' }}</p>
                                    @foreach($subcategory->menu->take(10) as $menu)
                                        <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $menu->slug]) }}" class="cat-nav-link">{{ $menu->name }}</a>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => 'odezhda']) }}" class="watch-all">{{ __('Смотреть все') }}</a>
                </div>
                @if((session('sex') === 'kids' ? 'active' : ''))
                        <div class="bordered-1">
                            <div class="flex">
                                <img src="{{ asset('i/kids-2.png') }}" alt="" class="cat-image-left">
                                <div class="dif-cats">
                                    <div class="flex">
                                        @foreach($category->secondCategories() as $subcategory)
                                            <div class="cat">
                                                <p class="title">{{ $subcategory->name }}</p>
                                                @foreach($subcategory->menu->take(10) as $menuItem)
                                                    <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $menuItem->slug]) }}" class="cat-nav-link">{{ $menuItem->name }}</a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                    <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => 'odezhda']) }}" class="watch-all">{{ __('Смотреть все') }}</a>
                                </div>
                            </div>
                        </div>
                @endif
            </div>
            <div class="flex item-center desktop">
                <div class="centered only-images">
                    @if((session('sex') === 'female') ? 'active' : '')
                        <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $category->slug, 'brand' => ['La Perla']]) }}"><img src="{{ url('i/products/cloth-sl-1.jpg') }}" alt=""></a>
                        <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $category->slug, 'brand' => ['Zardozi']]) }}"><img src="{{ url('i/products/cloth-st-2.jpg') }}" alt=""></a>
                    @elseif((session('sex') === 'male') ? 'active' : '')
                        <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $category->slug, 'brand' => ['La Perla']]) }}"><img src="{{ url('i/products/cloth-sl-1.jpg') }}" alt=""></a>
                        <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $category->slug, 'brand' => ['Zardozi']]) }}"><img src="{{ url('i/products/cloth-st-2.jpg') }}" alt=""></a>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
