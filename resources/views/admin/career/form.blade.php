<p style="background: black; color: white; padding: 10px;">RU</p>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="name" type="text" required id="name" value="{!! old('name'),  $category->name ?? '' !!}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<p style="background: black; color: white; padding: 10px;">EN</p>
<div class="form-group {{ $errors->has('name_en') ? 'has-error' : ''}}">
    <label for="name_en" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="name_en" type="text" required id="name_en" value="{!! old('name_en'), $category->name_en ?? '' !!}" >
    {!! $errors->first('name_en', '<p class="help-block">:message</p>') !!}
</div>
<p style="background: black; color: white; padding: 10px;">KZ</p>
<div class="form-group {{ $errors->has('name_kz') ? 'has-error' : ''}}">
    <label for="name_kz" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="name_kz" type="text" required id="name_kz" value="{!! old('name_kz'), $category->name_kz ?? '' !!}" >
    {!! $errors->first('name_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    <label for="order" class="control-label">{{ 'Позиция' }}</label>
    <input class="form-control" name="order" type="number" id="order" value="{!! old('order'), $category->order ?? '' !!}">
    {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
