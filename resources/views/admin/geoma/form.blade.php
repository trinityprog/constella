<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="control-label">{{ 'City' }}</label>
    <input class="form-control" name="city" type="text" id="city" value="{!! old('city'), isset($geoma->city) ? $geoma->city : '' !!}">
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('connection') ? 'has-error' : ''}}">
    <label for="connection" class="control-label">{{ 'Connection' }}</label>
    <input class="form-control" name="connection" type="text" id="connection" value="{!! old('connection'), isset($geoma->connection) ? $geoma->connection : '' !!}">
    {!! $errors->first('connection', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{!! old('email'), isset($geoma->email) ? $geoma->email : '' !!}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{!! old('name'), isset($geoma->name) ? $geoma->name : '' !!}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{!! old('phone'), isset($geoma->phone) ? $geoma->phone : '' !!}">
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    <label for="surname" class="control-label">{{ 'Surname' }}</label>
    <input class="form-control" name="surname" type="text" id="surname" value="{!! old('surname'), isset($geoma->surname) ? $geoma->surname : '' !!}">
    {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('figures') ? 'has-error' : ''}}">
    <label for="figures" class="control-label">{{ 'Figures' }}</label>
    <textarea class="form-control" rows="5" name="figures" type="textarea" id="figures">{!! old('figures'), isset($geoma->figures) ? $geoma->figures : '' !!}</textarea>
    {!! $errors->first('figures', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
