<div class="big-holder">
    <a href="#" class="cat-link">{{ $category->getName() }}</a>
    <div class="big-dropdown {{ $category->slug }}">
        <div class="container flex space-between">
            <div class="unbordered flex">
                @if($category->image)<img src="{{ url('i/products/'. $category->image) }}" alt="" class="cat-image-left">@endif
                <div class="dif-cats">
                    <div class="flex">
                        @foreach($subCategories->whereIn('id', [6, 7]) as $subcategory)
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
                    <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => 'interer']) }}" class="watch-all">{{ __('Смотреть все') }}</a>
                </div>
            </div>
            <div class="flex item-center desktop">
                <div class="centered">
                    <img src="{{ url('i/products/inter-1.jpg') }}" class="inte-image" />
                </div>
            </div>
        </div>
    </div>
</div>
