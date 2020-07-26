@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
    </div>
        <div class="card">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <th scope="row">{{$category->name}}</th>
                                <td>
                                    <a class="" href="#">
                                        <i class=" fas fa-edit" style="color:blue ; text-align:center;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="" href="#">
                                        <i class="fas fa-trash-alt " style="color:red; text-align: center;"></i>                                        </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
@endsection
