<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label mb-0">{{ 'Название' }}</label>
    <input class="form-control" name="name" type="text" id="name" required value="{{ old('name', isset($pack_promocode) ? $pack_promocode->name : 'Промокоды от ' . now()->format('d.m.Y')) }}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<hr>

<div class="form-group">
    <span class="control-label" style="color: red;">{{ 'Тип' }}</span>
    <div class="form-check">
        <input class="form-check-input" id="type_one" type="radio" name="type" value="one" {{ old('type', isset($pack_promocode) ? $pack_promocode->type : null) == 'one' ? 'checked' : '' }}>
        <label class="form-check-label" for="type_one">Один на определенный срок</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" id="type_more" type="radio" name="type" value="more" {{ old('type', isset($pack_promocode) ? $pack_promocode->type : null) == 'more' ? 'checked' : '' }}>
        <label class="form-check-label" for="type_more">Одноразовыe промокоды</label>
    </div>
    {!! $errors->first('type', '<p class="help-block" style="background: red; color: white;">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('promocode') ? 'has-error' : ''}}" style="{{ old('promocode') || isset($pack_promocode) && $pack_promocode->type == 'one' ? '' : 'display:none' }}">
    <label for="promocode" class="control-label mb-0">{{ 'Промокод' }}</label>
    <input class="form-control" name="promocode" type="text" id="promocode" value="{{ old('promocode', isset($pack_promocode)&& $pack_promocode->type == 'one' ? $pack_promocode->promocodes->first()->code : '') }}">
    {!! $errors->first('promocode', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('expiration.start') ? 'has-error' : ''}}" style="{{ old('expiration.start', isset($pack_promocode) && $pack_promocode->expiration ? $pack_promocode->expiration->start : '') ? '' : 'display:none' }}">
    <label for="expiration_start" class="control-label mb-0">{{ 'Срок годность (начало)' }}</label>
    <input class="form-control" name="expiration[start]" type="date" id="expiration_start" value="{{ old('expiration.start', isset($pack_promocode) && $pack_promocode->expiration && $pack_promocode->type == 'one' ? $pack_promocode->expiration->start : '') }}">
    {!! $errors->first('expiration.start', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('expiration.end') ? 'has-error' : ''}}" style="{{ old('expiration.end', isset($pack_promocode) && $pack_promocode->expiration ? $pack_promocode->expiration->end : '') ? '' : 'display:none' }}">
    <label for="expiration_end" class="control-label mb-0">{{ 'Срок годность (конец)' }}</label>
    <input class="form-control" name="expiration[end]" type="date" id="expiration_end" value="{{ old('expiration.end', isset($pack_promocode) && $pack_promocode->expiration && $pack_promocode->type == 'one' ? $pack_promocode->expiration->end : '') }}">
    {!! $errors->first('expiration.end', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}" style="{{ isset($pack_promocode) && $pack_promocode->type == 'more' ? '' : 'display:none' }}">
    <label for="quantity" class="control-label mb-0">{{ 'Кол-во' }}</label>
    <input class="form-control" name="quantity" type="number" min="1" id="quantity" required value="{{ old('quantity', isset($pack_promocode) ? $pack_promocode->quantity : 1) }}">
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>

<hr>

<div class="form-group">
    <span class="control-label" style="color: red;">{{ 'Тип скидки' }}</span>
    <div class="form-check">
        <input class="form-check-input" id="discount_type_percent" type="radio" name="discount[type]" value="percent" {{ old('discount.type', isset($pack_promocode) ? $pack_promocode->discount->type : null) == 'percent' ? 'checked' : '' }}>
        <label class="form-check-label" for="discount_type_percent">Проценты</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" id="discount_type_price" type="radio" name="discount[type]" value="price" {{ old('discount.type', isset($pack_promocode) ? $pack_promocode->discount->type : null) == 'price' ? 'checked' : '' }}>
        <label class="form-check-label" for="discount_type_price">Стоимость</label>
    </div>
    {!! $errors->first('discount.type', '<p class="help-block" style="background: red; color: white;">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('discount.percent') ? 'has-error' : ''}}" style="{{ isset($pack_promocode) && $pack_promocode->discount->type == 'percent' ? '' : 'display:none' }}">
    <label for="discount_percent" class="control-label mb-0">{{ 'Проценты' }}</label>
    <input class="form-control" name="discount[percent]" type="number" min="1" max="99" id="discount_percent" value="{{ old('discount.percent', isset($pack_promocode) && isset($pack_promocode->discount->percent) ? $pack_promocode->discount->percent : 1) }}">
    {!! $errors->first('discount.percent', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('discount.price') ? 'has-error' : ''}}" style="{{ isset($pack_promocode) && $pack_promocode->discount->type == 'price' ? '' : 'display:none' }}">
    <label for="discount_price" class="control-label mb-0">{{ 'Стоимость' }}</label>
    <input class="form-control" name="discount[price]" type="number" min="1" id="discount_price" value="{{ old('discount.price', isset($pack_promocode) && isset($pack_promocode->discount->price) ? $pack_promocode->discount->price : 1) }}">
    {!! $errors->first('discount.price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('discount.currency_id') ? 'has-error' : ''}}" style="{{ isset($pack_promocode) && $pack_promocode->discount->type == 'price' ? '' : 'display:none' }}">
    <label for="discount_currency_id" class="control-label">{{ 'Валюта' }}</label>
    <select name="discount[currency_id]" id="discount_currency_id" class="form-control">
        @foreach($currencies as $currency)
            <option value="{{ $currency->id }}" {{ old('discount.currency_id', isset($pack_promocode) && isset($pack_promocode->discount->currency_id) && $pack_promocode->discount->currency_id) == $currency->id ? 'selected' : '' }}>{{ $currency->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('discount.currency_id', '<p class="help-block">:message</p>') !!}
</div>

<hr>

<div class="form-group {{ $errors->has('relation.type') ? 'has-error' : ''}}">
    <label for="relation_type" class="control-label">{{ 'Товар' }}</label>
    <select name="relation[type]" id="relation_type" class="form-control">
        @foreach($relationTypes as $key => $type)
            <option value="{{ $key }}" {{ old('relation.type', isset($pack_promocode) && $pack_promocode->relation->type ? $pack_promocode->relation->type : '') == $key ? 'selected' : '' }}>{{ $type }}</option>
        @endforeach
    </select>
    {!! $errors->first('relation.type', '<p class="help-block">:message</p>') !!}
</div>

@foreach(array_slice($relationTypes, 1) as $key => $type)
    <div class="form-group {{ $errors->has('relation.' . $key) ? 'has-error' : '' }} relation_type_group" style="{{ isset($pack_promocode) && $pack_promocode->relation->type == $key ? '' : 'display:none' }}">
        <label for="relation_{{ $key }}_name" class="control-label">{{ $type }}</label>
        <select name="relation[{{ $key }}]" id="relation_{{ $key }}_name" class="form-control">
            @foreach(${$key} as $name)
                <option value="{{ $name }}" {{ old('relation.' . $key, isset($pack_promocode) && isset($pack_promocode->relation->name) && $pack_promocode->relation->name) == $name ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        {!! $errors->first('relation.' . $key, '<p class="help-block">:message</p>') !!}
    </div>
@endforeach

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>


@section('js')
    <script>
        $('[name=type]').change(function () {
            $('#quantity').closest('.form-group').hide();
            $('#promocode').closest('.form-group').hide();
            $('#expiration_start').closest('.form-group').hide();
            $('#expiration_end').closest('.form-group').hide();
            if($(this).val() == 'one') {
                $('#promocode').closest('.form-group').show();
                $('#expiration_start').closest('.form-group').show();
                $('#expiration_end').closest('.form-group').show();
            } else {
                $('#quantity').closest('.form-group').show();
            }
        })
        $('[name="discount[type]"]').change(function () {
            $('#discount_percent').closest('.form-group').hide();
            $('#discount_price').closest('.form-group').hide();
            $('#discount_currency_id').closest('.form-group').hide();
            if($(this).val() == 'percent') {
                $('#discount_percent').closest('.form-group').show();
            } else {
                $('#discount_price').closest('.form-group').show();
                $('#discount_currency_id').closest('.form-group').show();
            }
        })
        $('#relation_type').change(function () {
            $('.relation_type_group').hide()
            if($(this).val() != 'all') {
                $('#relation_' + $(this).val() + '_name').closest('.form-group').show()
            }
        })
    </script>
@endsection
