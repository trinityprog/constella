@if(isset($section) && $section->blocks->count() > 0)
    <div class="new-collection">
        <div class="container">
            <div class="collection-title">{!! $section->titleLocal !!}</div>
            @handheld
            <div class="collection-list">
                @foreach($section->blocks as $block)
                    <a href="{{ $block->url }}" class="collection-item">
                        <img src="{{ asset('i/' . $block->image) }}" alt="">
                        <div class="inner">
                            <div class="col-logo" style="background-image: url('{{ asset('i/' . $block->brand_logo) }}');"></div>
                            <div class="col-description">
                                <p class="col-de">{{ __('Коллекция') }}</p>
                                <p class="col-ne">{{ $block->collection }}</p>
                                <span class="col-eye"></span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @elsehandheld
            <div class="collection-list flex item-center">
                <div class="collection-item first">
                    <img src="{{ asset('i/' . $section->blocks->first()->image) }}" alt="">
                </div>
                @foreach($section->blocks as $block)
                    <div class="collection-item">
                        <a class="collection-link" href="{{ $block->url }}">
                            <div class="inner">
                                <div class="col-logo" style="background-image: url('{{ asset('i/' . $block->brand_logo) }}');"></div>
                                <div class="col-description">
                                    <p class="col-de">{{ __('Коллекция') }}</p>
                                    <p class="col-ne">{{ $block->collection }}</p>
                                    <span class="col-eye"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @endhandheld
        </div>
    </div>
@endif
