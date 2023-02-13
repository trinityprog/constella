<p style="background: black; color: white; padding: 10px;">RU</p>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name_ru" class="control-label">{{ 'Название' }}</label>
    <input class="form-control" name="name_ru" type="text" required id="name_ru" value="{!! old('name'), isset($address->name->ru) ? $address->name->ru : '' !!}" >
    {!! $errors->first('name_ru', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('info') ? 'has-error' : ''}}">
    <label for="info_ru" class="control-label">{{ 'Адрес' }}</label>
    <input class="form-control" name="info_ru" type="text" id="info_ru" value="{!! old('info'), isset($address->info->ru) ? $address->info->ru : '' !!}" >
    {!! $errors->first('info_ru', '<p class="help-block">:message</p>') !!}
</div>


<p style="background: black; color: white; padding: 10px;">EN</p>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name_en" class="control-label">{{ 'Название' }}</label>
    <input class="form-control" name="name_en" type="text" required id="name_en" value="{!! old('name'), isset($address->name->en) ? $address->name->en : '' !!}" >
    {!! $errors->first('name_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('info') ? 'has-error' : ''}}">
    <label for="info_en" class="control-label">{{ 'Адрес' }}</label>
    <input class="form-control" name="info_en" type="text" id="info_en" value="{!! old('info'), isset($address->name->en) ? $address->name->en : '' !!}" >
    {!! $errors->first('info_en', '<p class="help-block">:message</p>') !!}
</div>


<p style="background: black; color: white; padding: 10px;">KZ</p>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name_kz" class="control-label">{{ 'Название' }}</label>
    <input class="form-control" name="name_kz" type="text" required id="name_kz" value="{!! old('name'), isset($address->name->kz) ? $address->name->kz : '' !!}" >
    {!! $errors->first('name_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('info') ? 'has-error' : ''}}">
    <label for="info_kz" class="control-label">{{ 'Адрес' }}</label>
    <input class="form-control" name="info_kz" type="text" id="info_kz" value="{!! old('info'), isset($address->info->ru) ? $address->info->ru : '' !!}" >
    {!! $errors->first('info_kz', '<p class="help-block">:message</p>') !!}
</div>

<p style="background: black; color: white; padding: 10px;">Координаты</p>

<div class="form-group {{ $errors->has('coordinates') ? 'has-error' : ''}}">
    <label for="coordinates_x" class="control-label">{{ 'Широта' }}</label>
    <input class="form-control" name="coordinates_x" type="text" id="coordinates_x" value="{!! old('coordinates'), isset($address->coordinates->x) ? $address->coordinates->x : '' !!}">
    {!! $errors->first('coordinates_x', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('coordinates') ? 'has-error' : ''}}">
    <label for="coordinates_y" class="control-label">{{ 'Долгота' }}</label>
    <input class="form-control" name="coordinates_y" type="text" id="coordinates_y" value="{!! old('coordinates'), isset($address->coordinates->y) ? $address->coordinates->y : '' !!}">
    {!! $errors->first('coordinates_y', '<p class="help-block">:message</p>') !!}
</div>

<div class="phones" id="dynamic_field">
    <div class="form-group {{ $errors->has('phones') ? 'has-error' : ''}}">
        <label for="phones" class="control-label">{{ 'Телефоны' }}</label>
        <div style="display: flex; gap: 1rem">
            <input class="form-control" name="phones[]" type="tel" id="phones" value="{!! old('phones'), isset($address->phones) ? '' : '' !!}">
            <button type="button" name="add" id="add" class="btn btn-success">+</button>
        </div>
        {!! $errors->first('phones', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input type="hidden" name="city_id" value="{{ request()->get('city_id') }}">

<div class="form-group {{ $errors->has('brands') ? 'has-error' : ''}}">
    <label for="brands" class="control-label">{{ 'Бренды' }}</label>
    <select name="brands[]" multiple id="brands" class="form-control" style="height: 10rem;">
        @foreach($city->allBrandsModels as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('brands', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" id="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Добавить' }}">
</div>
