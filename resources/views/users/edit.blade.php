@extends('layouts.app')
 @section('title')
     Home
@endsection
@section('content')
     <div class="card">
        <div class="card-header">My Profile</div>

        <div class="card-body">
            @include('partials.errors')
            <form action="{{ route('users.update-profile') }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" placeholder="Enter Name" >
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->about }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update Profile</button>
            </form>
        </div>
    </div>
@endsection
