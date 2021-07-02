<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control selectpicker', 'id' => 'user_id']) !!}
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_id', 'Location:') !!}
    {!! Form::select('location_id', $locations, null, ['class' => 'form-control selectpicker', 'id' => 'location_id']) !!}
</div>

<!-- Activity Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activity_id', 'Activity:') !!}
    {!! Form::select('activity_id', $activities, null, ['class' => 'form-control selectpicker', 'id' => 'activity_id']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-1">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::number('quantity', 1, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 1]) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-5">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control', 'id'=>'date']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    <button type="button" class="btn btn-success" id="btn-add-works" style="padding: 5px 20px; margin: 0 5px;">Add</button>
    <button type="button" class="btn btn-primary" id="btn-save-works" style="padding: 5px 20px; margin: 0 5px;">Save</button>
    {{-- Form::submit('Save and exit', ['class' => 'btn btn-primary']) --}}
    <a href="{{ route('works.index') }}" class="btn btn-default" style="padding: 5px 20px; margin: 0 5px;">Back</a>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 40px">User</th>
                        <th style="width: 20px">Location</th>
                        <th style="width: 10px">Actiity</th>
                        <th style="width: 5px">Quantity</th>
                        <th style="width: 10px">Date</th>
                        <th style="width: 5px">Actions</th>
                    </tr>
                    <tbody id="works-table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script type="text/javascript">
    let date = new Date();

    $('#date').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false,
        defaultDate: date.setMonth(date.getMonth() - 1),
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let worksLabels = [];
    let arrayValues = [];

    $(function() {
        rendetable();
    });

    $('#btn-add-works').on('click', function() {

        if (validation()) {
            let arrayLabel = [
                $('#user_id option:selected').html(),
                $('#location_id option:selected').html(),
                $('#activity_id option:selected').html(),
                $('#quantity').val(),
                $('#date').val(),
            ];

            let arrayValue = {
                "user_id": $('#user_id').val(),
                "location_id": $('#location_id').val(),
                "activity_id": $('#activity_id').val(),
                "quantity": $('#quantity').val(),
                "date": $('#date').val(),
            };

            worksLabels.push(arrayLabel);
            arrayValues.push(arrayValue);
            rendetable(worksLabels);
        }
    });

    function rendetable(worksLabels) {
        let html = '';

        $.each(worksLabels, function(index, work) {
            html += '<tr>';

            $.each(work, function(index, value) {
                html += '<td>' + value + '</td>';
            });
            html += '<td><button class="button delete-element" data-id="' + index + '"> Delete</button></td>';
            html += '</tr>';

        });

        $('#works-table').html(html);

        toogleSaveButton();
    }

    function validation() {
        if ($('#date').val() != '') {
            return true;
        } else {
            return false;
        }
    }

    $('#works-table').on('click', '.delete-element', function() {

        let id = $(this).data('id');

        worksLabels.splice(id, 1);
        arrayValues.splice(id, 1);

        rendetable(worksLabels);
    });

    function toogleSaveButton() {

        if (worksLabels.length == 0) {
            $('#btn-save-works').prop('disabled', true);
        } else {
            $('#btn-save-works').prop('disabled', false);
        }
    }

    $('#btn-save-works').on('click', function() {

        $.ajax({
            type: 'POST',
            url: '/massive_works',
            data: {
                "data": arrayValues
            },
            success: function(data) {

                arrayValues = [];
                worksLabels = [];
                rendetable(worksLabels)
            }
        });
    });

    $(function() {

        window.onbeforeunload = preguntarAntesDeSalir;

        function preguntarAntesDeSalir() {
            if (arrayValues.length != 0) {
                return "¿Seguro que quieres salir?";
            }
        }

    })
</script>


@endsection