<div class="form-group {{ $errors->has('from') ? 'has-error' : ''}}">
    <label for="from" class="control-label">{{ 'From' }}</label>
    <input class="form-control" name="from" type="number" id="from" value="{{ isset($message->from) ? $message->from : ''}}" >
    {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('to') ? 'has-error' : ''}}">
    <label for="to" class="control-label">{{ 'To' }}</label>
    <input class="form-control" name="to" type="number" id="to" value="{{ isset($message->to) ? $message->to : ''}}" >
    {!! $errors->first('to', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    <label for="text" class="control-label">{{ 'Text' }}</label>
    <textarea class="form-control" rows="5" name="text" type="textarea" id="text" >{{ isset($message->text) ? $message->text : ''}}</textarea>
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="control-label">{{ 'State' }}</label>
    <input class="form-control" name="state" type="text" id="state" value="{{ isset($message->state) ? $message->state : ''}}" >
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
