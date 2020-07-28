 @extends('Layouts.app')
 @section('title')
     Posts/index
 @endsection
 @section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Add Posts</a>
    </div>
    <div class="card">
        <div class="card-header">Create Post</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                    <th scope="col">id</th>
                    <th scope="col">Image</th>
                     <th scope="col">Name</th>
                      <th scope="col">description</th>
                    <th scope="col">edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>
                                <img class="rounded-circle" src="{{$post->image}}" alt="{{$post->title}}" width="50px" height="50px" border-radius:50%>
                            </td>
                            <td scope="row">{{$post->title}}</td>
                            <td scope="row">{{$post->description}}</td>
                            <td>
                            <a class="" href="{{route('posts.edit',$post->id)}}">
                                    <i class=" fas fa-edit" style="color:blue ; text-align:center;"></i>
                                </a>
                            </td>
                            <td>
                                <a class="" href="#">
                                    <i class="fas fa-trash-alt " onclick="handelDelete({{$post->id}})" style="color:red; text-align: center;"></i>                                        </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="post" id="deletCategoryForm">
                    @csrf
                    @method ('delete')
                    
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel"> Delete Posts</h5>
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