@if(count(array_filter($data)) > 0)
<div class="filter-block {{ (request()->has('color')) ? 'active' : '' }}">
    <p class="filter-name"><a href="#">{{ $type }} <span></span></a></p>
    <input type="hidden" name="colors[]">

    <ul class="colors-filter toggle" style="{{ (request()->has('color')) ? 'display:block' : '' }}">
        @foreach(array_filter($data) as $color)
            <li class="{{ request()->has('color') && in_array($color, request()->input('color')) ? 'active' : '' }}" data-type="color" data-value="{{ $color }}">
                @php $colorBg = \App\Models\Color::where('name', $color)->first(); @endphp
                <span class="color" style="background: {{ $colorBg->code ?? '#f5f5f5' }}"></span>
                <span class="text">{{ $color }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endif
