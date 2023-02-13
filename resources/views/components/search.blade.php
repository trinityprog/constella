<div class="search-expanded">
    <div class="container">
        <form action="#" class="form styled" onsubmit="event.preventDefault();">
            <img src="{{ url('i/icons/zoom.svg') }}" alt="" class="zoom">
            <input class="search-input" type="text" name="search" placeholder="{{ __('Что вы ищете') }}">
            <img src="{{ url('i/icons/close-black.svg') }}" alt="" class="clear-search search-toggler">
        </form>

        <div class="search-popular">
            <p class="title">{{ __('Популярное') }}</p>
            <div class="popular-results flex items-start space-center">
                <div class="block">
                    <a href="{{ route('page.catalog', ['sex' =>  $data->slug, 'category' => 'odezhda', 'brand' => ['La Perla']]) }}" class="cat-nav-link">
                        <img src="{{ url('i/s-1.png') }}" alt="" class="image">
                        <img src="{{ url('i/logos/laperla.png') }}" alt="" class="brand">
                        <p>{{ __('Нижнее белье') }}</p>
                    </a>
                </div>
                <div class="block">
                    <a href="{{ route('page.catalog', ['sex' => $data->slug, 'category' => 'yuvelirnye-izdeliya', 'brand' => ['Damiani'], 'collection' => ['Belle Epoque']]) }}">
                        <img src="{{ url('i/s-2.png') }}" alt="" class="image">
                        <img src="{{ url('i/logos/damiani.png') }}" alt="" class="brand">
                        <p>{{ __('Коллекция') }} <br>Belle Epoque Rainbow</p>
                    </a>
                </div>
                <div class="block">
                    <a href="{{ route('page.catalog', ['sex' => $data->slug, 'category' => 'platya', 'brand' => ['Zardozi']]) }}">
                        <img src="{{ url('i/s-3.png') }}" alt="" class="image">
                        <img src="{{ url('i/logos/zardozi.png') }}" alt="" class="brand">
                        <p>{{ __('Платья') }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
