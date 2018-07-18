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
                      @foreach ($activetickets as $ticket)
                        <div class="card"><div class="card-body">
                          {{ Form::model($ticket, ['method' => 'POST', 'route' => ['release.ownership', $ticket->id]]) }}
                          {{ Form::hidden('release_ownetship_ticket_id', $ticket->id) }}
                          {{ Form::submit('Release ownership', array('class'=>'float-right btn-danger btn-sm')) }}
                          {{ Form::close() }}
                          <a href="{{ route('tickets.show', ['id' => $ticket->id] ) }}">{{ $ticket->subject }}</a>
                        </div></div>
                      @endforeach
                    @else
                        <center><b>No active tickets</b></center>
                    @endif
                    <hr />

                    @if($teams->count()>0)
                      @foreach ($teams as $team)
                        <h2>Active tasks for Team {{ $team->name }}</h2>
                        @if($team->tickets->count()>0)
                          @foreach ($team->tickets as $ticket)
                            <div class="card"><div class="card-body">
                              {{ Form::model($ticket, ['method' => 'POST', 'route' => ['take.ownership', $ticket->id]]) }}
                              {{ Form::hidden('set_ownetship_ticket_id', $ticket->id) }}
                              {{ Form::submit('Take ownership', array('class'=>'float-right btn-success btn-sm')) }}
                              {{ Form::close() }}
                              <a href="{{ route('tickets.show', ['id' => $ticket->id] ) }}">{{ $ticket->subject }}</a>
                            </div></div>
                          @endforeach
                        @else
                            <center><b>No tickets available for this team</b></center>
                        @endif
                        <hr />
                      @endforeach
                    @else
                      <h2>You don't belong to any team</h2>
                      <b>Please enroll on settings</b>
                      <hr />
                    @endif

                    <h2>Tasks pending review</h2>
                    @if($pendingtickets->count()>0)
                      @foreach ($pendingtickets as $ticket)
                        <div class="card"><div class="card-body">
                          {{ Form::model($ticket, ['method' => 'POST', 'route' => ['release.ownership', $ticket->id]]) }}
                          {{ Form::hidden('release_ownetship_ticket_id', $ticket->id) }}
                          {{ Form::submit('Release ownership', array('class'=>'float-right btn-danger btn-sm')) }}
                          {{ Form::close() }}
                          <a href="{{ route('tickets.show', ['id' => $ticket->id] ) }}">{{ $ticket->subject }}</a>
                        </div></div>
                      @endforeach
                    @else
                        <center><b>No pending tickets</b></center>
                    @endif
                    <hr />

                    <h2>Tasks closed</h2>
                    @if($closedtickets->count()>0)
                      @foreach ($closedtickets as $ticket)
                        <div class="card"><div class="card-body">
                          {{ Form::model($ticket, ['method' => 'POST', 'route' => ['release.ownership', $ticket->id]]) }}
                          {{ Form::hidden('release_ownetship_ticket_id', $ticket->id) }}
                          {{ Form::submit('Release ownership', array('class'=>'float-right btn-danger btn-sm')) }}
                          {{ Form::close() }}
                          <a href="{{ route('tickets.show', ['id' => $ticket->id] ) }}">{{ $ticket->subject }}</a>
                        </div></div>
                      @endforeach
                    @else
                        <center><b>No closed tickets</b></center>
                    @endif
                    <hr />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
