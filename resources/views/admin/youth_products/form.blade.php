<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Номенклатура' }}</label>
    <select name="product_id" id="product_id" class="form-control">
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Категория' }}</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="category-{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        @foreach($menu as $m)
            <option value="menu-{{ $m->id }}">{{ $m->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Добавить' }}">
</div>
