<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label mb-0">{{ 'Заголовок' }}</label>
    <input class="form-control" name="title" type="text" id="title" required value="{!! old('title', isset($section) ? $section->title : '') !!}">
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('title_en') ? 'has-error' : ''}}">
    <label for="title_en" class="control-label mb-0">{{ 'Заголовок EN' }}</label>
    <input class="form-control" name="title_en" type="text" id="title_en" required value="{!! old('title_en', isset($section) ? $section->title_en : '') !!}">
    {!! $errors->first('title_en', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('title_kz') ? 'has-error' : ''}}">
    <label for="title_kz" class="control-label mb-0">{{ 'Заголовок KZ' }}</label>
    <input class="form-control" name="title_kz" type="text" id="title_kz" required value="{!! old('title_kz', isset($section) ? $section->title_kz : '') !!}">
    {!! $errors->first('title_kz', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <span class="control-label" style="color: red;">{{ 'Привязка по?' }}</span>
    <div class="form-check">
        <input class="form-check-input" id="relation_type_category" type="radio" name="relation_type" value="category">
        <label class="form-check-label" for="relation_type_category">Категории</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" id="relation_type_page" type="radio" name="relation_type" value="page">
        <label class="form-check-label" for="relation_type_page">Типу страницы</label>
    </div>
</div>

<div class="form-group {{ $errors->has('page_type') ? 'has-error' : ''}}" style="display: none">
    <label for="page_type" class="control-label">{{ 'Страница / Тип' }}</label>
    <select name="page_type" id="page_type" class="form-control" required>
        <option value="{{ 'index_female' }}">{{ 'Главная / Для неё' }}</option>
        <option value="{{ 'index_male' }}">{{ 'Главная / Для него' }}</option>
        <option value="{{ 'index_kids' }}">{{ 'Главная / Детям' }}</option>
    </select>
    {!! $errors->first('page_type', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}" style="display: none">
    <label for="category_id" class="control-label">{{ 'Категория/ Тип' }}</label>
    <select name="category_id" id="category_id" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ isset($section->category_id) && $section->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }} / {{ $category->type->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

@foreach(range(0, 2) as $index)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title pt-1">{{ $index + 1 }} блок</h3>
        </div>
        <div class="card-body">
            <div class="form-group {{ $errors->has('blocks.' . $index . '.brand_logo') ? 'has-error' : ''}}">
                <label for="blocks_{{ $index }}_brand_logo" class="control-label">{{ __('Бренд (лого)') }}</label>
                <p class="small" style="color: red;">Только изображения черного цвета!</p>
                <input type="file" name="blocks[{{ $index }}][brand_logo]" id="blocks_{{ $index }}_brand_logo" class="form-control" >
                {!! $errors->first('blocks.' . $index . '.brand_logo', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('blocks.' . $index . '.collection') ? 'has-error' : ''}}">
                <label for="blocks_{{ $index }}_collection" class="control-label mb-0">{{ 'Коллекция' }}</label>
                <input class="form-control" name="blocks[{{ $index }}][collection]" value="{{ $section->blocks[$index]->collection ?? '' }}" type="text" id="blocks_{{ $index }}_collection" required >
                {!! $errors->first('blocks.' . $index . '.collection', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('blocks.' . $index . '.url') ? 'has-error' : ''}}">
                <label for="blocks_{{ $index }}_url" class="control-label mb-0">{{ 'Ссылка' }}</label>
                <input class="form-control" name="blocks[{{ $index }}][url]" value="{{ $section->blocks[$index]->url ?? '' }}" type="text" id="blocks_{{ $index }}_url" required >
                {!! $errors->first('blocks.' . $index . '.url', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('blocks.' . $index . '.image') ? 'has-error' : ''}}">
                <label for="blocks_{{ $index }}_image" class="control-label">{{ __('Изображение') }}</label>
                <input type="file" name="blocks[{{ $index }}][image]" id="blocks_{{ $index }}_image" class="form-control" >
                {!! $errors->first('blocks.' . $index . '.image', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
@endforeach

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Добавить' }}">
</div>


@section('js')
    <script>
        $('[name=relation_type]').change(function () {
            if($(this).val() == 'category') {
                $('#page_type').closest('.form-group').hide();
                $('#category_id').closest('.form-group').show();
            } else {
                $('#page_type').closest('.form-group').show();
                $('#category_id').closest('.form-group').hide();
            }
        })
    </script>
@endsection
