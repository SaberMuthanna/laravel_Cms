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
            @if ($posts->count()>0)
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                    <th scope="col">id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">description</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>
                                {{-- <img src="{{ $post->image }}" alt=""> --}}
                                <img class="rounded-circle" src="{{ $post->image }}" alt="" width="50px" height="50px" >
                            </td>
                            <td scope="row">{{$post->title}}</td>
                            <td scope="row">{{$post->description}}</td>
                            <td scope="row">{{$post->category->name}}</td>
                            @if (!$post->trashed())
                            <td>
                                <a class="btn" href="{{route('posts.edit',$post->id)}}">
                                        <i class=" fas fa-edit" style="color:blue ; "></i>
                                </a>
                            </td>
                            @endif

                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"> <i class="fas fa-trash-alt"  style="color:red ; "> </i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            @else
              <h3 class="text-center"> NO Posts </h3>
            @endif
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="post" id="deletCategoryForm">
                    @csrf

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
