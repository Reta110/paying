@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Work
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('works.show_fields')
                    <a href="{{ route('works.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
