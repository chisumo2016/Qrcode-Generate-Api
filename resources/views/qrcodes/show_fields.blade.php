<div class="col-sm-6">
    <!-- Product Name Field -->
    <div class="form-group">
        {{--{!! Form::label('product_name', 'Product Name:') !!}--}}
        <h3>{!! $qrcode->product_name !!}
            <br>
        @if(isset($qrcode->company_name))

                <small>By {!! $qrcode->company_name !!}</small>
             @endif
        </h3>
    </div>

    <!-- Amount Field -->
    <div class="form-group">
        {{--{!! Form::label('amount', 'Amount:') !!}--}}
        <h4>Amount: £ {!! $qrcode->amount !!}</h4>
    </div>


    <!-- Product Url Field -->
    <div class="form-group">
        {!! Form::label('product_url', 'Product Url:') !!}
        <p>
            <a href="{!! $qrcode->product_url !!}" target="_blank">
            {!! $qrcode->product_url !!}

            </a>

        </p>
    </div>


    <!-- User Id Field -->
    @if($qrcode->user_id  == Auth::user()->id || Auth::user()->role_id < 3)
        <hr>

    <div class="form-group">
        {!! Form::label('user_id', 'User Name:') !!}
        <p>{!! $qrcode->user_id !!}</p>
    </div>

    <!-- Website Field -->
    <div class="form-group">
        {!! Form::label('website', 'Website:') !!}
        <p>{!! $qrcode->website !!}</p>
    </div>

    <!-- Callback Url Field -->
    <div class="form-group">
        {!! Form::label('callback_url', 'Callback Url:') !!}
        <p>{!! $qrcode->callback_url !!}</p>
    </div>


    <!-- Status Field -->
    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        <p>
            @if($qrcode->status == 1 )
                Active
            @else                         {{--{!! $qrcode->status !!}--}}
                Inactive

             @endif

        </p>
    </div>

    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{!! $qrcode->created_at !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{!! $qrcode->updated_at !!}</p>
    </div>
</div>
@endif
<div class="col-md-5 pull-right">

    <!-- Qrcode Path Field {!! $qrcode->qrcode_path !!}-->
    <div class="form-group">
        {!! Form::label('qrcode_path', 'Scan QRcode and Pay with Our App:') !!}
        <p>
        <img src="{{ asset($qrcode->qrcode_path) }}" alt="" >
        </p>
    </div>

</div>

{{--<!-- Id Field -->--}}
{{--<div class="form-group">--}}
{{--{!! Form::label('id', 'Id:') !!}--}}
{{--<p>{!! $qrcode->id !!}</p>--}}
{{--</div>--}}

{{--<!-- Company Name Field -->--}}
{{--<div class="form-group">--}}
{{--{!! Form::label('company_name', 'Company Name:') !!}--}}
{{--<p>{!! $qrcode->company_name !!}</p>--}}
{{--</div>--}}


