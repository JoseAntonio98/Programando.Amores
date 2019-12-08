<div class="form-group {{ $errors->has('user') ? 'has-error' : ''}}">
    <label for="user" class="control-label">{{ 'User' }}</label>
    <input class="form-control" name="user" type="number" id="user" value="{{ isset($friend->user) ? $friend->user : ''}}" >
    {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('friend') ? 'has-error' : ''}}">
    <label for="friend" class="control-label">{{ 'Friend' }}</label>
    <input class="form-control" name="friend" type="number" id="friend" value="{{ isset($friend->friend) ? $friend->friend : ''}}" >
    {!! $errors->first('friend', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="control-label">{{ 'State' }}</label>
    <input class="form-control" name="state" type="text" id="state" value="{{ isset($friend->state) ? $friend->state : ''}}" >
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
