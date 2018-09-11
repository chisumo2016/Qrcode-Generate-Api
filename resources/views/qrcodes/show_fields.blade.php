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
    @if(!Auth::guest() && ($qrcode->user_id  == Auth::user()->id || Auth::user()->role_id < 3))
        <hr>

    <div class="form-group">
        {!! Form::label('user_id', 'User:') !!}
        <p>{!! $qrcode->user['email'] !!}</p>
    </div>

    <!-- Website Field -->
    <div class="form-group">
        {!! Form::label('website', 'Website:') !!}
        <p><a href="{!! $qrcode->website !!}" target="_blank"></a>{!! $qrcode->website !!}</p>
    </div>

    <!-- Callback Url Field -->
    <div class="form-group">
        {!! Form::label('callback_url', 'Callback Url:') !!}
        <p><a href="{!! $qrcode->callback_url !!}" target="_blank">>{!! $qrcode->callback_url !!}</a></p>
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

@endif
</div>
<div class="col-md-5 pull-right">

    <!-- Qrcode Path Field {!! $qrcode->qrcode_path !!}-->
    <div class="form-group">
        {!! Form::label('qrcode_path', 'Scan QRcode and Pay with Our App:') !!}
        <p>
        <img src="{{ asset($qrcode->qrcode_path) }}" alt="" >
        </p>
    </div>
        @if(!Auth::guest())
            @include('qrcodes.paystack')
         @else
            <form action="" method="post" role="form" class="col-md-6">
                <div class="form-group" >
                    <label for="email">Enter your Email</label>
                    <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" class="form-control">
                </div>

                    <p>
                        <button class="btn btn-success btn-lg" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button>
                    </p>


            </form>
        @endif
</div>

@if(!Auth::guest() && ($qrcode->user_id  == Auth::user()->id || Auth::user()->role_id < 3))
<div class="col-xs-12">
<h3 class="text-center">Transactions doene on this Qrcode</h3>

@include('trasanctions.table')

</div>
@endif











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


