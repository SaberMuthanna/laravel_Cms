 @extends('Layouts.app')
 @section('title')
     Posts/create
 @endsection
 @section('content')
        <div class="card">
        <div class="card-header">
        {{isset($post)?'Edit post':'Create post'    }}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data" >
                {{  csrf_field() }}
                @if (isset($post))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="tilte">Title</label>
                <input type="text" class="form-control" name="title" value="{{isset($post) ?$post->title :''}}" placeholder="Enter title" >
                </div>
                <div class="form-group">
                   <label for="description">Description</label>
                   <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                   <label for="content">Content</label>
                   <textarea id="content" class="form-control" name="content" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                <input type="text" class="form-control" id="published_at" name="published_at" value="" placeholder="Enter Name" >
                </div>
                <div class="form-group">
                    <label for="image"> Image</label>
                <input type="file" class="form-control" id="image" name="image" value="" placeholder="Enter Name" >
                </div>
                <button type="submit" class="btn btn-primary">
                    {{isset($post) ? 'Update':'Create '
                }}
        </button>
            </form>
        </div>
    </div>
 @endsection
