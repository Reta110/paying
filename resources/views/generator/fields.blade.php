<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<!-- Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('month', 'Month:') !!}
    {!! Form::select('month', $months, null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field 
<div class="form-group col-sm-6">
    {!! Form::label('from', 'From:') !!}
    {!! Form::date('from', null, ['class' => 'form-control','id'=>'from']) !!}
</div>

Date Field 
<div class="form-group col-sm-6">
    {!! Form::label('to', 'To:') !!}
    {!! Form::date('to', null, ['class' => 'form-control','id'=>'to']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#from').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true
        })

        $('#to').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true
        })

    </script>
@endsection-->

<!-- Submit Field -->
<div class="form-group .ol-md-offset-6 col-md-2 col-sm-offset-6 col-sm-2">
    {!! Form::submit('Generate', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('works.index') }}" class="btn btn-default">Cancel</a>
</div>
