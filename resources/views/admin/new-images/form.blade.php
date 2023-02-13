<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <input type="hidden" name="new_id" value="{{ request()->get('new_id') }}">
    <label for="image" class="control-label">{{ 'Изображение' }}</label>
    <input class="form-control" name="image" type="file" multiple id="image">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    <label for="order" class="control-label">{{ 'Позиция' }}</label>
    <input class="form-control" name="order" type="number" id="order"
           value="{!! old('order'), isset($newImage->order) ? $newImage->order : '' !!}">
    {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Добавить' }}">
</div>
