<p style="background: black; color: white; padding: 10px;">RU</p>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Описание 1' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description">{!! old('description'), $product->description ?? '' !!}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_right') ? 'has-error' : ''}}">
    <label for="description_right" class="control-label">{{ 'Описание 2' }}</label>
    <textarea class="form-control" rows="5" name="description_right" type="textarea" id="description_right">{!! old('description_right'), $product->description_right ?? '' !!}</textarea>
    {!! $errors->first('description_right', '<p class="help-block">:message</p>') !!}
</div>
<hr>

<p style="background: black; color: white; padding: 10px;">EN</p>
<div class="form-group {{ $errors->has('description_en') ? 'has-error' : ''}}">
    <label for="description_en" class="control-label">{{ 'Описание 1' }}</label>
    <textarea class="form-control" rows="5" name="description_en" type="textarea" id="description_en">{!! old('description_en'), $product->description_en ?? '' !!}</textarea>
    {!! $errors->first('description_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_right_en') ? 'has-error' : ''}}">
    <label for="description_right_en" class="control-label">{{ 'Описание 2' }}</label>
    <textarea class="form-control" rows="5" name="description_right_en" type="textarea" id="description_right_en">{!! old('description_right_en'), $product->description_right_en ?? '' !!}</textarea>
    {!! $errors->first('description_right_en', '<p class="help-block">:message</p>') !!}
</div>
<hr>

<p style="background: black; color: white; padding: 10px;">KZ</p>
<div class="form-group {{ $errors->has('description_kz') ? 'has-error' : ''}}">
    <label for="description_kz" class="control-label">{{ 'Описание 1' }}</label>
    <textarea class="form-control" rows="5" name="description_kz" type="textarea" id="description_kz">{!! old('description_kz'), $product->description_kz ?? '' !!}</textarea>
    {!! $errors->first('description_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description_right_kz') ? 'has-error' : ''}}">
    <label for="description_right_kz" class="control-label">{{ 'Описание 2' }}</label>
    <textarea class="form-control" rows="5" name="description_right_kz" type="textarea" id="description_right_kz">{!! old('description_right_kz'), $product->description_right_kz ?? '' !!}</textarea>
    {!! $errors->first('description_right_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
