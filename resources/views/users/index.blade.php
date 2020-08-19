 @extends('Layouts.app')
 @section('title')
     Posts/index
 @endsection
 @section('content')

    <div class="card">
        <div class="card-header">List Users</div>
        <div class="card-body">
            @if ($users->count()>0)
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        {{--  <th scope="col">id</th>  --}}
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            {{--  <th scope="row">{{$user->id}}</th>  --}}
                            <td scope="row">
                                {{--  {{ Gravatar::src($user->email) }}  --}}
                                <img height="40px" width="40px" style="border-radios:50%" src="{{ Gravatar::src('$user->email') }}">

                            </td>
                            <td scope="row">{{$user->name}}</td>
                            <td scope ="row">
                                @if (!$user->isAdmin())
                                    <form action="{{route('users.make-admin',$user->id)}}" method="post">
                                        @csrf
                                        <button type="submit"  class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
                                @else
                                 <div class="btn btn-success btn-sm">Is Admin</div>
                                @endif
                            </td>
                            <td>
                                <a class="btn" href="#">
                                        <i class="fas fa-edit" style ="color:blue ; "></i>
                                </a>
                            </td>
                            <td>
                                <form action="" method="post">
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
