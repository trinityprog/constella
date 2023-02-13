<div class="form-group {{ $errors->has('type_id') ? 'has-error' : ''}}">
    <label for="type_id" class="control-label">{{ 'Пол' }}</label>
    <select name="type_id" id="type_id" class="form-control">
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ isset($slider->type_id) && $slider->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('page') ? 'has-error' : ''}}">
    <label for="type_id" class="control-label">{{ __('Страница') }}</label>
    <select name="page" id="page" class="form-control">
        <option value="index">{{ __('Главная страница') }}</option>
    </select>
    {!! $errors->first('page', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ __('Изображение') }}</label>
    <input type="file" name="image" id="image" class="form-control">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('m_image') ? 'has-error' : ''}}">
    <label for="m_image" class="control-label">{{ __('Изображение (моб. версия)') }}</label>
    <input type="file" name="m_image" id="m_image" class="form-control">
    {!! $errors->first('m_image ', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ __('Ссылка') }}</label>
    <input type="text" name="link" class="form-control" value="{!! old('link', $banner->link ?? '' ) !!}">
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
