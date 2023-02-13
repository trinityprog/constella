<div class="form-group {{ $errors->has('alt_tag') ? 'has-error' : ''}}">
    <label for="alt_tag" class="control-label">{{ 'Alt tag' }}</label>
    <input class="form-control" name="alt_tag" type="text" id="alt_tag" value="{!! old('alt_tag'), $item->alt_tag ?? '' !!}" >
    {!! $errors->first('alt_tag', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Добавить' }}">
</div>
