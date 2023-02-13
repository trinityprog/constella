<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <input type="hidden" name="product_id" value="{{ request()->get('product_id') }}">
    <label for="is_main" class="control-label">{{ 'Изображение' }}</label>
    <input class="form-control" name="image" type="file" id="image">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('is_main') ? 'has-error' : ''}}">
    <label class="control-label mb-0">{{ 'Главное изображение?' }}</label>
    <p class="small" style="color: red;">Отмечать галочку только для главного изображения!</p>
    <div class="form-check">
        <label for="is_main" class="form-check-label">
            <input type="checkbox" name="is_main" id="is_main" class="form-check-input"> Да
        </label>
    </div>
    {!! $errors->first('is_main', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Добавить' }}">
</div>
