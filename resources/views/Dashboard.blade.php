@extends('layouts.app')
 @section('title')
     Home
 @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class ="col-md-12">
           <div class="row text-center">
               <div class="col-md-3">
                <div class="card text-white bg-primary " >
                    <div class="card-header">User-count</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $users_count}}</h5>
                    </div>
                </div>
               </div>
               <div class="col-md-3">
                    <div class="card text-white bg-secondary col-md-4" style="max-width: 18rem;">
                        <div class="card-header">Posts-count</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $posts_count }}</h5>
                        </div>
                    </div>
               </div>
               <div class="col-md-3">
                    <div class="card text-white bg-success col-md-4" style="max-width: 18rem;">
                        <div class="card-header">Categ-countt</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $categories_count }}</h5>
                        </div>
                    </div>
               </div>
               <div class="col-md-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header">Tag-count</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $tags_count }}</h5>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>
@endsection
