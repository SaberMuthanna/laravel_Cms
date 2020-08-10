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
                <input type="text" class="form-control" name="title" value="{{isset($post) ? $post->title :''}}" placeholder="Enter title" >
                </div>
                <div class="form-group">
                   <label for="description">Description</label>
                   <textarea id="description" class="form-control" value="" name="description" rows="3">{{isset($post) ? $post->description :''}}</textarea>
                </div>
                <div class="form-group">
                   <label for="content">Content</label> <br>
                   <input id="content"  type="hidden" name="content"  value ="{{isset($post) ? $post->content :''}}" >
                   <trix-editor input="content"> </trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                <input type="text" class="form-control" id="published_at" name="published_at" value="{{isset($post)?$post->published_at:''}}" placeholder="Select Date.." >

                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{ asset($post->image) }}" alt="" srcset="" style="width:100% ;" >
                    </div>
                @endif
                <div class="form-group">
                    <label for="image"> Image</label>
                    <input type="file" class="form-control" id="image" name="image"  placeholder="upload image" >
                </div>
                <div class="form-group">
                    <label for="category"> Category</label>
                    <select  class="form-control" id="category" name="category"  >
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                            {{$category->name   }}
                        </option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{isset($post) ? 'Update':'Create '
                }}
               </button>
            </form>
        </div>
    </div>
 @endsection

 @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at' , {
            enableTime: true,
            minDate: "today",
            dateFormat: "Y-m-d H:i",
        })
    </script>
 @endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
