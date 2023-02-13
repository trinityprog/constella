<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Родительская категория' }}</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $id => $category)
            <optgroup label="{{\App\Models\Category::find($id)->name}}">
                @foreach($category as $cat)
                    <option value="{!! old('category_id'), $cat->id !!}">{{ $cat->name }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>

    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Название' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{!! old('name'), isset($menu->name) ? $menu->name : '' !!}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('name_en') ? 'has-error' : ''}}">
    <label for="name_en" class="control-label">{{ 'Название на английском' }}</label>
    <input class="form-control" name="name_en" type="text" id="name_en" value="{!! old('name_en'), isset($menu->name_en) ? $menu->name_en : '' !!}" >
    {!! $errors->first('name_en', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('name_kz') ? 'has-error' : ''}}">
    <label for="name_kz" class="control-label">{{ 'Название на казахском' }}</label>
    <input class="form-control" name="name_kz" type="text" id="name_kz" value="{!! old('name_kz'), isset($menu->name_kz) ? $menu->name_kz : '' !!}" >
    {!! $errors->first('name_kz', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
