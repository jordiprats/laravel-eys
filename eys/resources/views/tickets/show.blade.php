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
                    </ul>
                    {{ $ticket->description }}
                    <hr />

                    <h2>Work Log</h2>
                    <hr />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
