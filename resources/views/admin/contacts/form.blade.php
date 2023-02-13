<p style="background: black; color: white; padding: 10px;">RU</p>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name_ru" class="control-label">{{ 'Название города' }}</label>
    <input class="form-control" name="name_ru" type="text" required id="name_ru" value="{!! old('name'), isset($city->name->ru) ? $city->name->ru : '' !!}" >
    {!! $errors->first('name_ru', '<p class="help-block">:message</p>') !!}
</div>


<p style="background: black; color: white; padding: 10px;">EN</p>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name_en" class="control-label">{{ 'Название города' }}</label>
    <input class="form-control" name="name_en" type="text" required id="name_en" value="{!! old('name'), isset($city->name->en) ? $city->name->en : '' !!}" >
    {!! $errors->first('name_en', '<p class="help-block">:message</p>') !!}
</div>


<p style="background: black; color: white; padding: 10px;">KZ</p>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name_kz" class="control-label">{{ 'Название города' }}</label>
    <input class="form-control" name="name_kz" type="text" required id="name_kz" value="{!! old('name'), isset($city->name->kz) ? $city->name->kz : '' !!}" >
    {!! $errors->first('name_kz', '<p class="help-block">:message</p>') !!}
</div>

<p style="background: black; color: white; padding: 10px;">Координаты города</p>

<div class="form-group {{ $errors->has('coordinates') ? 'has-error' : ''}}">
    <label for="coordinates_x" class="control-label">{{ 'Широта' }}</label>
    <input class="form-control" name="coordinates_x" type="text" id="coordinates_x" value="{!! old('coordinates'), isset($city->coordinates->x) ? $city->coordinates->x : '' !!}">
    {!! $errors->first('coordinates_x', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('coordinates') ? 'has-error' : ''}}">
    <label for="coordinates_y" class="control-label">{{ 'Долгота' }}</label>
    <input class="form-control" name="coordinates_y" type="text" id="coordinates_y" value="{!! old('coordinates'), isset($city->coordinates->y) ? $city->coordinates->y : '' !!}">
    {!! $errors->first('coordinates_y', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Добавить' }}">
</div>
