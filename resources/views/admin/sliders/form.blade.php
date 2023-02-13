<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Название (не обязательно)' }}</label>
    <input type="text" name="name" class="form-control" value="{!! isset($slider->name) ? $slider->name : '' !!}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('d_image') ? 'has-error' : ''}}">
    <label for="d_image" class="control-label">{{ 'Изображение' }}</label>
    <input type="file" name="image" class="form-control">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('m_image') ? 'has-error' : ''}}">
    <label for="m_image" class="control-label">{{ 'Изображение (мобильная версия)' }}</label>
    <input type="file" name="m_image" class="form-control">
    {!! $errors->first('m_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Ссылка' }}</label>
    <input class="form-control" name="link" type="text" id="link"
           value="{{ old('link', isset($slider->link) ? $slider->link : '' ) }}">
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type_id') ? 'has-error' : ''}}">
    <label for="type_id" class="control-label">{{ 'Пол' }}</label>
    <select name="type_id" id="type_id" class="form-control">
        <option value="">Выберите пол</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ isset($slider->type_id) && $slider->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    <label for="order" class="control-label">{{ 'Позиция' }}</label>
    <input class="form-control" name="order" type="number" id="order"
           value="{!! old('order'), isset($slider->order) ? $slider->order : '' !!}">
    {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
