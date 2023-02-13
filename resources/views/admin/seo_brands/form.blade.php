<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{!! old('title'), $brand->title ?? '' !!}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('seo_description') ? 'has-error' : ''}}">
    <label for="seo_description" class="control-label">{{ 'Описание' }}</label>
    <input class="form-control" name="seo_description" type="text" id="seo_description" value="{!! old('seo_description'), $brand->seo_description ?? '' !!}" >
    {!! $errors->first('seo_description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H1') ? 'has-error' : ''}}">
    <label for="H1" class="control-label">{{ 'Заголовок H1' }}</label>
    <input class="form-control" name="H1" type="text" id="H1" value="{!! old('H1'), $brand->H1 ?? '' !!}" >
    {!! $errors->first('H1', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H2') ? 'has-error' : ''}}">
    <label for="H2" class="control-label">{{ 'Заголовок H2' }}</label>
    <input class="form-control" name="H2" type="text" id="H2" value="{!! old('H2'), $brand->H2 ?? '' !!}" >
    {!! $errors->first('H2', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H3') ? 'has-error' : ''}}">
    <label for="H3" class="control-label">{{ 'Заголовок H3' }}</label>
    <input class="form-control" name="H3" type="text" id="H3" value="{!! old('H3'), $brand->H3 ?? '' !!}" >
    {!! $errors->first('H3', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H4') ? 'has-error' : ''}}">
    <label for="H4" class="control-label">{{ 'Заголовок H4' }}</label>
    <input class="form-control" name="H4" type="text" id="H4" value="{!! old('H4'), $brand->H4 ?? '' !!}" >
    {!! $errors->first('H4', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H5') ? 'has-error' : ''}}">
    <label for="H5" class="control-label">{{ 'Заголовок H5' }}</label>
    <input class="form-control" name="H5" type="text" id="H5" value="{!! old('H5'), $brand->H5 ?? '' !!}" >
    {!! $errors->first('H5', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H6') ? 'has-error' : ''}}">
    <label for="H6" class="control-label">{{ 'Заголовок H6' }}</label>
    <input class="form-control" name="H6" type="text" id="H6" value="{!! old('H6'), $brand->H6 ?? '' !!}" >
    {!! $errors->first('H6', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H1_seo_text') ? 'has-error' : ''}}">
    <label for="H1_seo_text" class="control-label">{{ 'SEO Текст H1' }}</label>
    <input class="form-control" name="H1_seo_text" type="text" id="H1_seo_text" value="{!! old('H1_seo_text'), $brand->H1_seo_text ?? '' !!}" >
    {!! $errors->first('H1_seo_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H2_seo_text') ? 'has-error' : ''}}">
    <label for="H2_seo_text" class="control-label">{{ 'SEO Текст H2' }}</label>
    <input class="form-control" name="H2_seo_text" type="text" id="H2_seo_text" value="{!! old('H2_seo_text'), $brand->H2_seo_text ?? '' !!}" >
    {!! $errors->first('H2_seo_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H3_seo_text') ? 'has-error' : ''}}">
    <label for="H3_seo_text" class="control-label">{{ 'SEO Текст H3' }}</label>
    <input class="form-control" name="H3_seo_text" type="text" id="H3_seo_text" value="{!! old('H3_seo_text'), $brand->H3_seo_text ?? '' !!}" >
    {!! $errors->first('H3_seo_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H4_seo_text') ? 'has-error' : ''}}">
    <label for="H4_seo_text" class="control-label">{{ 'SEO Текст H4' }}</label>
    <input class="form-control" name="H4_seo_text" type="text" id="H4_seo_text" value="{!! old('H4_seo_text'), $brand->H4_seo_text ?? '' !!}" >
    {!! $errors->first('H4_seo_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H5_seo_text') ? 'has-error' : ''}}">
    <label for="H5_seo_text" class="control-label">{{ 'SEO Текст H5' }}</label>
    <input class="form-control" name="H5_seo_text" type="text" id="H5_seo_text" value="{!! old('H5_seo_text'), $brand->H5_seo_text ?? '' !!}" >
    {!! $errors->first('H5_seo_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('H6_seo_text') ? 'has-error' : ''}}">
    <label for="H6_seo_text" class="control-label">{{ 'SEO Текст H6' }}</label>
    <input class="form-control" name="H6_seo_text" type="text" id="H6_seo_text" value="{!! old('H6_seo_text'), $brand->H6_seo_text ?? '' !!}" >
    {!! $errors->first('H6_seo_text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('keywords') ? 'has-error' : ''}}">
    <label for="keywords" class="control-label">{{ 'Ключевые слова' }}</label>
    <input class="form-control" name="keywords" type="text" id="keywords" value="{!! old('keywords'), $brand->keywords ?? '' !!}" >
    {!! $errors->first('keywords', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
