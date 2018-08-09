<!-- Id Field -->

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $role->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $role->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $role->updated_at->format('D d, M, Y') !!}</p>
</div>

<h3 class="text-center">Users that belongs to see roles</h3>
@include('users.table')



{{--<div class="form-group">--}}
    {{--{!! Form::label('id', 'Id:') !!}--}}
    {{--<p>{!! $role->id !!}</p>--}}
{{--</div>--}}


