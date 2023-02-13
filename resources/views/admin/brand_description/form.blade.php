<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Лого' }}</label>
    <input class="form-control" name="logo" type="file" id="logo">
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Описание' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{!! old('description'), isset($brand_description->description) ? $brand_description->description : '' !!}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Изображение (справа)' }}</label>
    <input class="form-control" name="image" type="file" id="image">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'Категория' }}</label>
    <select name="category" id="category" class="form-control">
        <option value="{{ 'ЮВЕЛИРНЫЕ БРЕНДЫ' }}">{{ 'ЮВЕЛИРНЫЕ БРЕНДЫ' }}</option>
        <option value="{{ 'FASHION БРЕНДЫ' }}">{{ 'FASHION БРЕНДЫ' }}</option>
        <option value="{{ 'HOME' }}">{{ 'HOME' }}</option>
    </select>
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
