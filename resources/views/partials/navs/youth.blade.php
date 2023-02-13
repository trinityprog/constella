<div class="big-holder">
    <a href="#" class="cat-link">{{ $category->name }}</a>
    <div class="big-dropdown {{ $category->slug }}">
        <div class="container flex space-between">
            <div class="unbordered flex">
                <img src="{{ url('i/products/'. $category->image) }}" alt="" class="cat-image-left">
                <div class="dif-cats">
                    <div class="flex">
                        @foreach($category->secondCategories() as $subcategory)
                            <div class="cat">
                                <p class="title">{{ $subcategory->name }}</p>
                                @foreach($subcategory->menu() as $items)
                                    <a href="{{ route('page.catalog', ['sex' => 'female', 'category' => $items->slug]) }}" class="cat-nav-link">{{ $items->name }}</a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
