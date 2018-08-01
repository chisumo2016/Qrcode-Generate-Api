<table class="table table-responsive" id="trasanctions-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Qrcode Id</th>
        <th>Qrcode Owner Id</th>
        <th>Payment Method</th>
        <th>Message</th>
        <th>Amount</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($trasanctions as $trasanction)
        <tr>
            <td>{!! $trasanction->user_id !!}</td>
            <td>{!! $trasanction->qrcode_id !!}</td>
            <td>{!! $trasanction->qrcode_owner_id !!}</td>
            <td>{!! $trasanction->payment_method !!}</td>
            <td>{!! $trasanction->message !!}</td>
            <td>{!! $trasanction->amount !!}</td>
            <td>{!! $trasanction->status !!}</td>
            <td>
                {!! Form::open(['route' => ['trasanctions.destroy', $trasanction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('trasanctions.show', [$trasanction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('trasanctions.edit', [$trasanction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>