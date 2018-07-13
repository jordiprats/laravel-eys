@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>User's list</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        {{ session()->forget('status') }}
                    @endif

                    <h1>{{ $user->name }}</h1>
                    {{ Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) }}
                    <div class="form-group">
                      {{ Form::label('name', 'Display name') }}
                      {{ Form::text('name', $user->name) }}
                    </div>

                    <div class="form-group">
                      {{ Form::label('teams', 'Teams') }}
                      {{  print_r($all_teams) }}
                      {{ Form::select('teams[]', $all_teams, $user->teams->only('id')->flatMap(function ($values) { return $values;}), [ 'multiple'=>'multiple' ]) }}
                    </div>

                    {{ Form::submit('Save', array('class'=>'btn-success btn-lg')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
