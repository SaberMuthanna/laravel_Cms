@extends('layouts.app')
@section('title')
 {{isset($tag)?'Edit Tag':'Create Tag'}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
        {{isset($tag)?'Edit Tag':'Create Tag'

        }}
        </div>
        <div class="card-body">
            @include('partials.errors')
            <form action="{{isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="POST" >
                {{  csrf_field() }}
                @if (isset($tag))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{isset($tag) ?$tag->name :''}}" placeholder="Enter Name" >
                </div>
                <button type="submit" class="btn btn-primary">
                    {{isset($tag) ? 'Update':'Create '
                }}
        </button>
            </form>
        </div>
    </div>
@endsection
