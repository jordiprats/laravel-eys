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

                    <h1>Tickets</h1>
                    <ul>
                      @foreach ($tickets as $ticket)
                        <li><a href="{{ route('tickets.show', ['id' => $ticket->id] ) }}">{{ $ticket->subject }}</a></li>
                      @endforeach
                    </ul>
                    {!! $tickets->links('pagination') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
