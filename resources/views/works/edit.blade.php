@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Work
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($work, ['route' => ['works.update', $work->id], 'method' => 'patch']) !!}

                        @include('works.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div> 
   </div>
@endsection