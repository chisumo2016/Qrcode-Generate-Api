<table class="table table-responsive" id="trasanctions-table">
    <thead>
        <tr>

        <th>Qrcode </th>
            <th>Buyer</th>
        {{--<th>Qrcode Owner Id</th>--}}
        <th>Method</th>
        {{--<th>Message</th>--}}
        <th>Amount</th>
        <th>Status</th>
            {{--<th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($trasanctions as $trasanction)
        <tr>

            {{--<td>{!! $trasanction->qrcode['product_name'] !!}</td>--}}
            <td>

                <a href="{!! route('trasanctions.show', [$trasanction->id]) !!}">
                    {!! $trasanction->qrcode['product_name'] !!}
                </a> |
                <small>{{ $trasanction->created_at->format('D d,M,Y h:i') }} </small>
            </td>
            <td>{!! $trasanction->user['name'] !!}</td>
            <td>{!! $trasanction->payment_method !!}</td>
            {{--<td>{!! $trasanction->message !!}</td>--}}
            <td>£{!! $trasanction->amount !!}</td>
            <td>{!! $trasanction->status !!} <br>
                <small>{{ $trasanction->updated_at->format('D d,M,Y h:i') }} </small>
            </td>
            {{--<td>--}}
                {{--{!! Form::open(['route' => ['trasanctions.destroy', $trasanction->id], 'method' => 'delete']) !!}--}}
                {{--<div class='btn-group'>--}}
                    {{--<a href="{!! route('trasanctions.show', [$trasanction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    {{--<a href="{!! route('trasanctions.edit', [$trasanction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>