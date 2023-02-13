<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Название c 1C' }}</label>
    <input disabled class="form-control" name="name" type="text" id="name" value="{!! old('name'), isset($color->name) ? $color->name : '' !!}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('abbr') ? 'has-error' : ''}}">
    <label for="abbr" class="control-label">{{ 'Код в 1С' }}</label>
    <input disabled class="form-control" name="abbr" type="text" id="abbr" value="{!! old('abbr'), isset($color->abbr) ? $color->abbr : '' !!}" >
    {!! $errors->first('abbr', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ 'Код цвета' }}</label>
    <input required class="form-control" type="color" name="code" value="{!! old('code'), isset($color->code) ? $color->code : '' !!}" id="code">
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_ru') ? 'has-error' : ''}}">
    <label for="name_ru" class="control-label">{{ 'Название RU' }}</label>
    <input required class="form-control" name="name_ru" type="text" id="name_ru" value="{!! old('name_ru'), isset($color->name_ru) ? $color->name_ru : '' !!}" >
    {!! $errors->first('name_ru', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_en') ? 'has-error' : ''}}">
    <label for="name_en" class="control-label">{{ 'Название EN' }}</label>
    <input required class="form-control" name="name_en" type="text" id="name_en" value="{!! old('name_en'), isset($color->name_en) ? $color->name_en : '' !!}" >
    {!! $errors->first('name_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name_kz') ? 'has-error' : ''}}">
    <label for="name_kz" class="control-label">{{ 'Название KZ' }}</label>
    <input required class="form-control" name="name_kz" type="text" id="name_kz" value="{!! old('name_kz'), isset($color->name_kz) ? $color->name_kz : '' !!}" >
    {!! $errors->first('name_kz', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
