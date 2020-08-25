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
            @include('partials.errors')
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
                   <label for="content">Content</label>
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
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if (isset($post))
                                    @if ($category->id == $post->category_id)
                                        selected
                                    @endif
                                @endif
                                >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($tags->count()>0)
                    <div class="form-group">
                    <label for="tags">Tag</label>
                    <select name="tags[]" id="tags" class="form-control  tags-selector"  multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                               @if (isset($post))
                                    @if($post->hastag($tag->id))
                                        selected
                                    @endif

                               @endif
                            >
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                @endif
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at' , {
            enableTime: true,
            enableSeconds:true

        })

        $(document).ready(function() {
            $('.tags-selector').select2();
        })

    </script>
 @endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
