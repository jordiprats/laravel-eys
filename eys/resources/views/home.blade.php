@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>{{ __('Dashboard') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert {{ session('status-class') }}" role="alert">
                            {{ session('status') }}
                        </div>
                        {{ session()->forget('status') }}
                    @endif

                    <h2>Tasks Owned by You</h2>
                    @if($activetickets->count()>0)
                      <ul>
                      @foreach ($activetickets as $ticket)
                        <div class="card"><div class="card-body">
                          <a href="{{ route('tickets.show', ['id' => $ticket->id] ) }}">{{ $ticket->subject }}</a>
                              {{ Form::model($ticket, ['method' => 'POST', 'route' => ['release.ownership', $ticket->id]]) }}
                              {{ Form::hidden('release_ownetship_ticket_id', $ticket->id) }}
                              {{ Form::submit('Release ownership', array('class'=>'float-right btn-danger btn-sm')) }}
                              {{ Form::close() }}
                        </div></div>
                        <hr />
                      @endforeach
                    </ul>
                    @else
                        <center><b>No active tickets, hooray!</b></center>
                    @endif

                    @if($teams->count()>0)
                      @foreach ($teams as $team)
                        <hr />
                        <h2>Active tasks for Team {{ $team->name }}</h2>
                        @if($team->tickets->count()>0)
                          @foreach ($team->tickets as $ticket)
                            <div class="card"><div class="card-body">
                            <a href="{{ route('tickets.show', ['id' => $ticket->id] ) }}">{{ $ticket->subject }}</a>
                              {{ Form::model($ticket, ['method' => 'POST', 'route' => ['take.ownership', $ticket->id]]) }}
                              {{ Form::hidden('set_ownetship_ticket_id', $ticket->id) }}
                              {{ Form::submit('Take ownership', array('class'=>'float-right btn-success btn-sm')) }}
                              {{ Form::close() }}
                            </div></div>
                            <hr />
                          @endforeach
                        @else
                            <center><b>No active tickets, hooray!</b></center>
                        @endif
                      @endforeach
                    @else
                      <hr />
                      <h2>You don't belong to any team</h2>
                      <b>Please enroll on settings</b>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
