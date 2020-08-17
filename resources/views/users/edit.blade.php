@extends('layouts.app')
 @section('title')
     Home
@endsection
@section('content')
     <div class="card">
        <div class="card-header">My Profile</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
    </div>
@endsection
