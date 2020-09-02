@extends('layouts.blog')
@section('title')
    saber Blog
@endsection
@section('header')
<!-- Header -->
{{-- #4f407b --}}
    <header class="header text-white h-fullscreen pb-8" style="background-color: #24292e">
      <canvas class="constellation" data-color="rgba(255,255,255,0.3)"></canvas>
      <div class="container text-center position-static">
<<<<<<< HEAD

      <marquee  class="marquee" direction="right" >!ما أجمل أن تكون حياً بعد مماتك  </marquee>

         <div class="row align-items-center h-100">

=======
      <marquee  class="marquee" direction="right" >ما أجمل أن تكون حياً بعد مماتك  </marquee>
         <div class="row align-items-center h-100">
>>>>>>> 3a1867c897c12ad5c1b901af9a3a83cac0a20cf5
          <div class="col-lg-6">
            <h1>! مرحبا صابر محمد</h1>
            <p class="lead mt-5 mb-8">.الأمل هي تلك النافذة الصغيرة، التي مهما صغر حجمها، إلّا أنها تفتح آفاقاً واسعة في الحياة</p>
            {{-- <p class="gap-xy">
              <a class="btn btn-round btn-outline-light mw-150" href="#">Learn more</a>
              <a class="btn btn-round btn-light mw-150" href="#">Sign up</a>
            </p> --}}
          </div>
          <div class="col-lg-5 ml-auto">
          <img class="mt-5" src="{{asset('img/laptop-1.png')}}" alt="img">
          </div>
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
