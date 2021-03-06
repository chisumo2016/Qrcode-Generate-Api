<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


{{--User Level --}}
<!-- Role Id Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('role_id', 'User Level:') !!}--}}
    {{--{!! Form::number('role_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    <label for="sel1">User Level:</label>
    <select class="form-control" id="sel1" name="roles[]" multiple>
        @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->label }}</option>
        @endforeach
    </select>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

{{--<!-- Remember Token Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('remember_token', 'Remember Token:') !!}--}}
    {{--{!! Form::text('remember_token', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
