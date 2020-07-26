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
                                <a class="" href="{{route('categories.edit',$category->id)}}">
                                        <i class=" fas fa-edit" style="color:blue ; text-align:center;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="" href="#">
                                        <i class="fas fa-trash-alt " onclick="handelDelete({{ $category->id }})" style="color:red; text-align: center;"></i>                                        </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        function handelDelete(id){
            console.log('deleting',id)
            $('#deleteModel').model('show')
        }
    </script>

@endsection
