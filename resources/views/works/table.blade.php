<div class="table-responsive">
    <table class="table" id="works-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Location</th>
                <th>Activity</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($works as $work)
            <tr>
                <td>{{ $work->user->name }}</td>
                <td>{{ $work->location->name }}</td>
                @if(isset($work->activity))
                <td>{{ $work->activity->name }}</td>
                <td>{{ $work->activity->amount }}</td>
                @else
                <td></td>
                <td></td>
                @endif
                <td>{{ $work->quantity }}</td>
                <td>{{ $work->date }}</td>
                <td>
                    {!! Form::open(['route' => ['works.destroy', $work->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('works.show', [$work->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        {{---<a href="{{ route('works.edit', [$work->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>---}}
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$works->links()}}
</div>