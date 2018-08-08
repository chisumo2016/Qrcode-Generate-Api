
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'User Level:') !!}
    <p>{!! $user->role['name'] !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>



<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Joined:') !!}
    <p>{!! $user->created_at->format('D d, M, Y h:i') !!}</p>
</div>

<!-- Id Field -->
{{--<div class="form-group">--}}
{{--{!! Form::label('id', 'Id:') !!}--}}
{{--<p>{!! $user->id !!}</p>--}}
{{--</div>--}}


{{--<!-- Password Field -->--}}
{{--<div class="form-group">--}}
{{--{!! Form::label('password', 'Password:') !!}--}}
{{--<p>{!! $user->password !!}</p>--}}
{{--</div>--}}

{{--<!-- Remember Token Field -->--}}
{{--<div class="form-group">--}}
{{--{!! Form::label('remember_token', 'Remember Token:') !!}--}}
{{--<p>{!! $user->remember_token !!}</p>--}}
{{--</div>--}}

{{--<!-- Updated At Field -->--}}
{{--<div class="form-group">--}}
    {{--{!! Form::label('updated_at', 'Updated At:') !!}--}}
    {{--<p>{!! $user->updated_at !!}</p>--}}
{{--</div>--}}

