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

                    <h1>Users</h1>
                    <ul>
                      @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                      @endforeach
                    </ul>
                    {!! $users->links('pagination') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
