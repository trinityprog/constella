<div class="form-group {{ $errors->has('unique_id') ? 'has-error' : ''}}">
    <label for="unique_id" class="control-label">{{ 'Unique Id' }}</label>
    <input class="form-control" name="unique_id" type="text" id="unique_id" value="{!! old('unique_id'), isset($order->unique_id) ? $order->unique_id : '' !!}">
    {!! $errors->first('unique_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{!! old('user_id'), isset($order->user_id) ? $order->user_id : '' !!}">
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{!! old('status'), isset($order->status) ? $order->status : '' !!}">
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
