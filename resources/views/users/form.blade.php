<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control"  name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control" name="password" type="password" id="password" >
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('profile_image') ? 'has-error' : ''}}">
    <label for="profile_image" class="control-label">{{ 'Profile Image' }}</label>
    <input class="form-control" name="profile_image" type="file" id="profile_image" value="{{ isset($user->profile_image) ? $user->profile_image : ''}}" >
    {!! $errors->first('profile_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <select class="form-control" name="role" type="text" id="role" value="{{ isset($user->role) ? $user->role : ''}}" >
       <option value="Normal">{{__('Normal')}}</option>
       <option value="Administrador">{{__('Administrator')}}</option>
    </select>
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('language') ? 'has-error' : ''}}">
    <label for="language" class="control-label">{{ 'Language' }}</label>
    <select class="form-control" name="language"  id="language" value="{{ isset($user->language) ? $user->language : ''}}" >
       <option value="Español">{{__('Spanish')}}</option>
       <option value="Ingles">{{__('English')}}</option>
       <option value="POrtugues">{{__('Portuguese')}}</option>
    </select>
    {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
