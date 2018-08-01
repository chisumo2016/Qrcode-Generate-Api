<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $trasanction->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $trasanction->user_id !!}</p>
</div>

<!-- Qrcode Id Field -->
<div class="form-group">
    {!! Form::label('qrcode_id', 'Qrcode Id:') !!}
    <p>{!! $trasanction->qrcode_id !!}</p>
</div>

<!-- Qrcode Owner Id Field -->
<div class="form-group">
    {!! Form::label('qrcode_owner_id', 'Qrcode Owner Id:') !!}
    <p>{!! $trasanction->qrcode_owner_id !!}</p>
</div>

<!-- Payment Method Field -->
<div class="form-group">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{!! $trasanction->payment_method !!}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{!! $trasanction->message !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $trasanction->amount !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $trasanction->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $trasanction->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $trasanction->updated_at !!}</p>
</div>

