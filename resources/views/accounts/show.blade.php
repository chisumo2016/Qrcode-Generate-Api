@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            Account: {{ $account->id }}

            <small>
                @if( $account->applied_for_payout == 1)
                        Payout request pending
                @endif
            </small>
        </h1>
    </section>

    <h1 class="pull-right">
        @if(Auth::user()->id == $account->user_id )
        {{--<a href="" class="btn btn-primary">Apply for payout</a>--}}
        {!! Form::open(['route' => ['users.destroy', $account->id], 'method' => 'delete', 'class'=>'pull-left']) !!}
        {!! Form::button('<i class="glyphicon glyphicon-ok"></i> Apply for payout', ['type' => 'submit', 'class' => 'btn btn-primary', 'onclick' => "return confirm('Are you sure?')"]) !!}

        {!! Form::close() !!}
        @endif

        @if(Auth::user()->role_id < 3)

        {!! Form::open(['route' => ['users.destroy', $account->id], 'method' => 'delete', 'class'=>'pull-right','style'=>'margin-left:10px']) !!}
        {!! Form::button('<i class="glyphicon glyphicon-ok"></i> Mark As Paid', ['type' => 'submit', 'class' => 'btn btn-primary ', 'onclick' => "return confirm('Are you sure?')"]) !!}

        {!! Form::close() !!}
        @endif
    </h1>




    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('accounts.show_fields')
                    {{--<a href="{!! route('accounts.index') !!}" class="btn btn-default">Back</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
