<div class="table-responsive">
    <table class="table" id="activities-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Amount</th>
        <th>Percent</th>
        <th>Total</th>
        <th>Activity Type</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($activities as $activities)
            <tr>
                <td>{{ $activities->name }}</td>
            <td>{{ $activities->amount }}</td>
            <td>{{ $activities->percent }}</td>
            <td>{{ $activities->total }}</td>
            <td>{{ $activities->activity_type->name }}</td>
                <td>
                    {!! Form::open(['route' => ['activities.destroy', $activities->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('activities.show', [$activities->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('activities.edit', [$activities->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
