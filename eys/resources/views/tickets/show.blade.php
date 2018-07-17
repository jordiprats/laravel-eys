@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>User's list</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert {{ session('status-class') }}" role="alert">
                            {{ session('status') }}
                        </div>
                        {{ session()->forget('status') }}
                    @endif

                    <h1>{{ $ticket->subject }}</h1>
                    <ul>
                      <li><b>Team</b>: {{ $ticket->team->name }}</li>
                      <li><b>Created</b>: {{ $ticket->created_at }}</li>
                      <li><b>Visibility</b>: {{ $ticket->visibility }}</li>
                      @if($user->activetickets()->find($ticket->id))
                      <li><b>Ownership</b>: {{ $user->name }}</li>
                      @endif
                    </ul>
                    <hr />

                    <h2>Original ticket description</h2>
                    {{ $ticket->description }}
                    <hr />

                    @if($user->activetickets()->find($ticket->id))
                      <div class="card">
                      <div class="card-header">Log work</div>
                      <div class="card-body">
                        {{ Form::open(['method' => 'POST', 'route' => ['comments.store']]) }}

                        {{ Form::hidden('ticket_id', $ticket->id) }}
                        {{ Form::hidden('user_id', $user->id) }}

                        <div class="form-group">
                          {{ Form::label('worktime', 'Time (in minutes)') }}
                          {{ Form::text('worktime', '', ['script' => 'var timeStamp_aq = Math.floor(Date.now() / 1000); alert("penis"); function wasted_aq() { var nouu = Math.floor(Date.now() / 1000); document.getElementsByName("worktime")[0].value=Math.floor(((nouu-timeStamp)/60)+1); setTimeout( "wasted_aq()", 60250 ); } wasted_aq();']) }}
                        </div>
                        <div class="form-group">
                          {{ Form::label('description', 'Work Log') }}
                          {{ Form::textarea('description', '') }}
                        </div>

                        {{ Form::submit('Log work', array('class'=>'btn-success btn-lg')) }}
                        {{ Form::close() }}
                      </div>
                      </div>
                    @endif

                    <h2>Work Log</h2>
                    @if($ticket->comments->count()>0)
                      @foreach ($ticket->comments as $comment)
                        <div class="card">
                        <div class="card-header">{{ $comment->created_at }}</div>
                        <div class="card-body">
                          {{ $comment->description }}
                        </div>
                        </div>
                      @endforeach
                    @else
                      <center>No updates so far</center>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
