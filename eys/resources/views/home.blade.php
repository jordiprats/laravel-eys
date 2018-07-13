@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Dashboard</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Tasks Owned by You</h2>
                    @if($activetickets->count()>0)
                      @foreach ($activetickets as $ticket)
                        <h3>{{ $ticket->subject }}</h3>
                      @endforeach
                    @else
                        <h3>No active tickets, hooray!</h3>
                    @endif

                    @if($activetickets->count()>0)
                      @foreach ($teams as $team)
                        <h2>Active tasks for Team {{ $team->name }}</h2>
                        ...
                      @endforeach
                    @else
                      <hr />
                      <h2>You don't belong to any team</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
