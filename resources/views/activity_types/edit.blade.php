@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Activity Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($activityType, ['route' => ['activityTypes.update', $activityType->id], 'method' => 'patch']) !!}

                        @include('activity_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection