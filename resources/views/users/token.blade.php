

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Client API</h1>

    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row-8 col-md" style="padding-left: 20px">
                    <div id="app">
                        <passport-clients></passport-clients>
                        <passport-authorized-clients></passport-authorized-clients>
                        <passport-personal-access-tokens></passport-personal-access-tokens>
                    </div>
                    {{--<a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
