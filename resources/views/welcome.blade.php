@extends('layouts.blog')
@section('title')
    saber Blog
@endsection
@section('header')
<!-- Header -->
    <header class="header text-white h-fullscreen pb-8" style="background-color: #4f407b">
      <canvas class="constellation" data-color="rgba(255,255,255,0.3)"></canvas>
      <div class="container text-center position-static">
        <div class="row h-100">
          <div class="col-md-7 col-xl-5 mx-auto align-self-center">
            <h1 class="display-1 fw-600 ls-3">Saber_almuthanna</h1>
            <p class="lead-3 mx-auto mt-6 mb-7">Is an elegant, modern and fully customizable SaaS and WebApp template.
            </p>
            {{--  <hr class="w-80px mb-7">  --}}
            {{--  <a class="btn btn-xl btn-round btn-light px-7" href="#">See Demos</a>  --}}
          </div>
{{--
          <div class="col-12 align-self-end text-center mt-6">
            <a class="scroll-down-1 scroll-down-white" href="#section-next"><span></span></a>
          </div>  --}}
        </div>
      </div>
    </header>
    <!-- END Header -->
  {{--  <!-- Header -->
  <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">

          <h1>Latest Blog Posts</h1>
          <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

        </div>
      </div>

    </div>

  </header>
 <!-- END Header -->  --}}
  <!-- Main Content -->
  @section('content')
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">
                @forelse ($posts as $post)
                  <div class="col-md-6">
                    <div class="card border hover-shadow-6 mb-6 d-block">
                      <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" src="{{ asset($post->image) }}"   alt="Card image cap"></a>
                      <div class="p-6 text-center">
                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="">
                          {{$post->category->name}}
                        </a></p>
                        <h5 class="mb-0">
                          <a class="text-dark" href="{{route('blog.show',$post->id)}}">
                            {{$post->title}}
                          </a>
                        </h5>
                      </div>
                    </div>
                </div>
                @empty
                    <p class="text-center">
                    No results found for Query : <strong>{{request()->query('search')}}</strong>
                    </p>
                @endforelse
              </div>
              {{-- <nav class="flexbox mt-30">
                <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
              </nav> --}}
              {{$posts->appends(['search'=>request()->query('search')])->links()}}

            </div>
             {{-- start sidebar --}}
              @include('partials.sidebar')
          </div>
        </div>
      </div>
    </main>
  @endsection
  <!--End  Main Content -->
@endsection
