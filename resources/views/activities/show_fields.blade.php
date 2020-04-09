<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $activities->name }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $activities->amount }}</p>
</div>

<!-- Percent Field -->
<div class="form-group">
    {!! Form::label('percent', 'Percent:') !!}
    <p>{{ $activities->percent }}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $activities->total }}</p>
</div>

<!-- Activity Type Id Field -->
<div class="form-group">
    {!! Form::label('activity_type_id', 'Activity Type Id:') !!}
    <p>{{ $activities->activity_type_id }}</p>
</div>

