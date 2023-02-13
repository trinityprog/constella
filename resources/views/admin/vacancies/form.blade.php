<p style="background: black; color: white; padding: 10px;">RU</p>
{{--@if( Config::get('app.locale') == 'en')--}}

{{--@endif--}}
<div class="form-group {{ $errors->has('title_ru') ? 'has-error' : ''}}">
    <label for="title_ru" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title_ru" type="text" required id="title_ru" value="{!! old('title_ru'), $career->title_ru ?? '' !!}">
    {!! $errors->first('title_ru', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_ru') ? 'has-error' : ''}}">
    <label for="text_ru" class="control-label">{{ 'Текст' }}</label>
    <textarea class="form-control" name="text_ru" rel="editor"  id="text_ru">{!! old('text_ru'), $career->text_ru ?? '' !!}</textarea>
    {!! $errors->first('text_ru', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address_ru') ? 'has-error' : ''}}">
    <label for="address_ru" class="control-label">{{ 'Адрес' }}</label>
    <textarea class="form-control" name="address_ru" rel="editor"  id="address_ru">{!! old('address_ru'), $career->address_ru ?? '' !!}</textarea>
    {!! $errors->first('address_ru', '<p class="help-block">:message</p>') !!}
</div>

<p style="background: black; color: white; padding: 10px;">EN</p>
<div class="form-group {{ $errors->has('title_en') ? 'has-error' : ''}}">
    <label for="title_en" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title_en" type="text" required id="name_en" value="{!! old('title_en'), $career->title_en ?? '' !!}">
    {!! $errors->first('title_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_en') ? 'has-error' : ''}}">
    <label for="text_en" class="control-label">{{ 'Текст' }}</label>
    <textarea class="form-control" name="text_en" rel="editor"  id="text_en">{!! old('text_en'), $career->text_en ?? '' !!}</textarea>
    {!! $errors->first('text_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address_en') ? 'has-error' : ''}}">
    <label for="address_en" class="control-label">{{ 'Адрес' }}</label>
    <textarea class="form-control" name="address_en" rel="editor"  id="address_en">{!! old('address_en'), $career->address_en ?? '' !!}</textarea>
    {!! $errors->first('address_en', '<p class="help-block">:message</p>') !!}
</div>

<p style="background: black; color: white; padding: 10px;">KZ</p>
<div class="form-group {{ $errors->has('title_kz') ? 'has-error' : ''}}">
    <label for="title_kz" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title_kz" type="text" required id="title_kz" value="{!! old('title_kz'), $career->title_kz ?? '' !!}">
    {!! $errors->first('title_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_kz') ? 'has-error' : ''}}">
    <label for="text_kz" class="control-label">{{ 'Текст' }}</label>
    <textarea class="form-control" name="text_kz" rel="editor"  id="text_kz">{!! old('text_kz'), $career->text_kz ?? '' !!}</textarea>
    {!! $errors->first('text_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address_kz') ? 'has-error' : ''}}">
    <label for="address_kz" class="control-label">{{ 'Адрес' }}</label>
    <textarea class="form-control" name="address_kz" rel="editor"  id="address_kz">{!! old('address_kz'), $career->address_kz ?? '' !!}</textarea>
    {!! $errors->first('address_kz', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    <label for="order" class="control-label">{{ 'Позиция' }}</label>
    <input class="form-control" name="order" type="number" id="order" value="{!! old('order'), $career->order ?? '' !!}">
    {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
    <label for="brand_id" class="control-label">{{ 'Название бренда' }}</label>
    <select name="brand_id" id="brand_id" class="form-control" required>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ isset($categories->brand_id) && $categories->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Название категории' }}</label>
    <select name="category_id" id="category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ isset($categories->category_id) && $categories->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
