<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $work->user_id }}</p>
</div>

<!-- Location Id Field -->
<div class="form-group">
    {!! Form::label('location_id', 'Location Id:') !!}
    <p>{{ $work->location_id }}</p>
</div>

<!-- Activity Id Field -->
<div class="form-group">
    {!! Form::label('activity_id', 'Activity Id:') !!}
    <p>{{ $work->activity_id }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $work->date }}</p>
</div>

