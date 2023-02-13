@if(count(array_filter($data)) > 0)
    <div class="filter-block {{ (request()->has($slug)) ? 'active' : '' }}">
        <p class="filter-name"><a href="#">{{ $type }} <span></span></a></p>

        <div class="list-filter toggle" style="{{ (request()->has($slug)) ? 'display:block' : '' }}">
            <ul>
                @foreach(array_filter($data) as $item)
                    @if($slug == 'stones')
                        <li><a href="#" data-type="{{ $slug }}" data-value="{{ json_decode($item)[0]->carat }}">{{ json_decode($item)[0]->carat }}</a></li>
                    @elseif($slug == 'cloth_material')
                        <li><a href="#" data-type="{{ $slug }}" data-value="{{ $item }}">{{ str_replace(['[', ']', '"'], '', $item) }}</a></li>
                    @else
                        <li><a class="{{ request()->has($slug) && in_array($item,  request()->input($slug)) ? 'active' : '' }}" href="#" data-type="{{ $slug }}" data-value="{{ $item }}">{{ ($item == '0') ? 'One size' : $item }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endif
