@extends('layouts.app')
@section('title')
    category Index
@endsection
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
    </div>
        <div class="card">
            <div class="card-header">Categories</div>
            <div class="card-body text-center">
                @if($categories->count()>0)
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                        <th scope="col">@lang('lang.Id')</th>
                        <th scope="col">@lang('lang.Name category')</th>
                        <th scope="col">@lang('lang.Post Count')</th>
                        <th scope="col">@lang('lang.Edit')</th>
                        <th scope="col">@lang('lang.Delete') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <th scope="row">{{$category->name}}</th>
                                <th scope="row">{{$category->posts->count()}}</th>

                                <td>
                                <a class="btn" href="{{route('categories.edit',$category->id)}}">
                                        <i class=" fas fa-edit" style="color:blue ; text-align:center;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn" href="#">
                                        <i class="fas fa-trash-alt " onclick="handelDelete({{$category->id}})" style="color:red; text-align: center;"></i>                                        </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <h3 class="text-center">
                    No categories
                </h3>
                @endif

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                   <form action="" method="post" id="deletCategoryForm">
                       @csrf
                       @method ('delete')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel"> Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <p class=" text-center text-bold">
                                Are You Sure you want to this Category ?
                              </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Backe</button>
                                <button type="submit" class="btn btn-danger">Yes Delete</button>
                            </div>
                        </div>
                   </form>
                </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        function handelDelete(id){

            var form = document.getElementById('deletCategoryForm')
            form.action ='/categories/'+ id
            $('#deleteModal').modal('show')

        }
    </script>
@endsection
