<p style="background: black; color: white; padding: 10px;">RU</p>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title" type="text" required id="title" value="{!! old('title'), isset($news->title) ? $news->title : '' !!}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_1') ? 'has-error' : ''}}">
    <label for="text_1" class="control-label">{{ 'Текст 1' }}</label>
    <textarea class="form-control" name="text_1" rel="editor"  id="text_1">{!! old('text_1'), isset($news->text_1) ? $news->text_1 : '' !!}</textarea>
    {!! $errors->first('text_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_2') ? 'has-error' : ''}}">
    <label for="text_2" class="control-label">{{ 'Текст 2' }}</label>
    <textarea class="form-control" name="text_2" rel="editor" id="text_2">{!! old('text_2'), isset($news->text_2) ? $news->text_2 : '' !!}</textarea>
    {!! $errors->first('text_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quote') ? 'has-error' : ''}}">
    <label for="quote" class="control-label">{{ 'Цитата' }}</label>
    <textarea class="form-control" name="quote" type="text" rel="editor" id="quote">{!! old('quote'), isset($news->quote) ? $news->quote : '' !!}</textarea>
    {!! $errors->first('quote', '<p class="help-block">:message</p>') !!}
</div>

<p style="background: black; color: white; padding: 10px;">EN</p>
<div class="form-group {{ $errors->has('title_en') ? 'has-error' : ''}}">
    <label for="title_en" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title_en" type="text" required id="title_en" value="{!! old('title_en'), isset($news->title_en) ? $news->title_en : '' !!}" >
    {!! $errors->first('title_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_1_en') ? 'has-error' : ''}}">
    <label for="text_1_en" class="control-label">{{ 'Текст 1' }}</label>
    <textarea class="form-control" name="text_1_en" rel="editor"  id="text_1_en">{!! old('text_1_en'), isset($news->text_1_en) ? $news->text_1_en : '' !!}</textarea>
    {!! $errors->first('text_1_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_2_en') ? 'has-error' : ''}}">
    <label for="text_2_en" class="control-label">{{ 'Текст 2' }}</label>
    <textarea class="form-control" name="text_2_en" rel="editor" id="text_2_en">{!! old('text_2_en'), isset($news->text_2_en) ? $news->text_2_en : '' !!}</textarea>
    {!! $errors->first('text_2_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quote_en') ? 'has-error' : ''}}">
    <label for="quote_en" class="control-label">{{ 'Цитата' }}</label>
    <textarea class="form-control" name="quote_en" type="text" rel="editor" id="quote_en">{!! old('quote_en'), isset($news->quote_en) ? $news->quote_en : '' !!}</textarea>
    {!! $errors->first('quote_en', '<p class="help-block">:message</p>') !!}
</div>

<p style="background: black; color: white; padding: 10px;">KZ</p>
<div class="form-group {{ $errors->has('title_kz') ? 'has-error' : ''}}">
    <label for="title_kz" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title_kz" type="text" required id="title_kz" value="{!! old('title_kz'), isset($news->title_kz) ? $news->title_kz : '' !!}" >
    {!! $errors->first('title_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_1_kz') ? 'has-error' : ''}}">
    <label for="text_1_kz" class="control-label">{{ 'Текст 1' }}</label>
    <textarea class="form-control" name="text_1_kz" rel="editor"  id="text_1_kz">{!! old('text_1_kz'), isset($news->text_1_kz) ? $news->text_1_kz : '' !!}</textarea>
    {!! $errors->first('text_1_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text_2_kz') ? 'has-error' : ''}}">
    <label for="text_2_kz" class="control-label">{{ 'Текст 2' }}</label>
    <textarea class="form-control" name="text_2_kz" rel="editor" id="text_2_kz">{!! old('text_2_kz'), isset($news->text_2_kz) ? $news->text_2_kz : '' !!}</textarea>
    {!! $errors->first('text_2_kz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quote_kz') ? 'has-error' : ''}}">
    <label for="quote_kz" class="control-label">{{ 'Цитата' }}</label>
    <textarea class="form-control" name="quote_kz" type="text" rel="editor" id="quote_kz">{!! old('quote_kz'), isset($news->quote_kz) ? $news->quote_kz : '' !!}</textarea>
    {!! $errors->first('quote_kz', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Логотип' }}</label>
    <input class="form-control" name="logo" type="file" id="logo" accept="image/png, image/jpeg" value="{{ isset($news->logo) ? $news->logo : ''}}" >
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Обложка' }}</label>
    <input class="form-control" name="image" type="file" id="image" accept="image/png, image/jpeg" value="{{ isset($news->image) ? $news->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    <label for="banner" class="control-label">{{ 'Баннер' }}</label>
    <input class="form-control" name="banner" type="file" id="banner" accept="image/png, image/jpeg" value="{{ isset($news->banner) ? $news->banner : ''}}" >
    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    <label for="order" class="control-label">{{ 'Позиция' }}</label>
    <input class="form-control" name="order" type="number" id="order" value="{!! old('order'), isset($news->order) ? $news->order : '' !!}">
    {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
