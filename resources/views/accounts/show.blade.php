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
        {{--<a href="" class="btn btn-primary">Apply for payout</a>--}}
        {!! Form::open(['route' => ['users.destroy', $account->id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Apply for payout', ['type' => 'submit', 'class' => 'btn btn-primary', 'onclick' => "return confirm('Are you sure?')"]) !!}

        {!! Form::close() !!}


        {!! Form::open(['route' => ['users.destroy', $account->id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Mark As Paid', ['type' => 'submit', 'class' => 'btn btn-primary ', 'onclick' => "return confirm('Are you sure?')"]) !!}

        {!! Form::close() !!}
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
