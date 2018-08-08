<!-- Id Field -->
{{--<div class="form-group">--}}
    {{--{!! Form::label('id', 'ID:') !!}--}}
    {{--<p>Transaction ID: #{!! $trasanction->id !!}</p>--}}
{{--</div>--}}

<!-- Qrcode Id Field -->
<div class="form-group">
    {!! Form::label('qrcode_id', 'Product Name:') !!}

    <p>
        <a href="/qrcodes/{!! $trasanction->qrcode['id'] !!}">
           <b> {!! $trasanction->qrcode['product_name'] !!} </b>
        </a>

    </p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>£ {!! $trasanction->amount !!}</p>
</div>


<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Buyer Name:') !!}

    <p>
        <a href="/users/{!! $trasanction->user['id'] !!}">
        {!! $trasanction->user['name'] !!}  | {!! $trasanction->user['email'] !!}
        </a>
    </p>
</div>



<!-- Qrcode Owner Id Field -->
<div class="form-group">
    {!! Form::label('qrcode_owner_id', 'Qrcode Owner Mame:') !!}
    <p>
        <a href="/users/{!! $trasanction->qrcode_owner['id'] !!}">

            {!! $trasanction->qrcode_owner['name']  !!}
        </a>

    </p>
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



<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $trasanction->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $trasanction->created_at->format('D d, M, Y h:i') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $trasanction->updated_at->format('D d, M, Y h:i') !!}</p>
</div>

