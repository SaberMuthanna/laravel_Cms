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

{{-- <div class="row h-100">
    <div class="col-md-7 col-xl-5 mx-auto align-self-center">
    <h1 class="display-1 fw-600 ls-3">صابر محمد </h1>
    <p class="lead-3 mx-auto mt-6 mb-7"> !مرحبا بكم
    </p>
    {{--  <hr class="w-80px mb-7">  --}}
    {{--  <a class="btn btn-xl btn-round btn-light px-7" href="#">See Demos</a>  --}}
    </div>

    {{-- <div class="col-12 align-self-end text-center mt-6">
    <a class="scroll-down-1 scroll-down-white" href="#section-next"><span></span></a>
    </div>
</div>  --}}
