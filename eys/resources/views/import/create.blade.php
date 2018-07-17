@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Import ticket</h1></div>

                <div class="card-body">
                  {{ Form::open(['method' => 'POST', 'route' => ['importer.store']]) }}

                  <div class="form-group">
                    {{ Form::label('url', 'URL') }}
                    {{ Form::text('url', 'http://', ['size'=>'100x1', 'onfocus'=>"if(this.value == 'http://') {this.value=''}"]) }}
                  </div>

                  {{ Form::submit('Import', array('class'=>'btn-info btn-lg')) }}
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
