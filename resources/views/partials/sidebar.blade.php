<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">
        <h6 class="sidebar-title">{{ __('lang.Search') }}</h6>
        <form class="input-group" target="#" action="" method="GET">
        <input type="text" class="form-control" name="search" placeholder="{{ __('lang.Search') }}"  value="{{request()->query('search')}}">
            <div class="input-group-addon">
                <span class="input-group-text"><i class="ti-search"></i></span>
            </div>
        </form>
        <hr>
        <h6 class="sidebar-title">{{ __('lang.CATEGORIES') }}</h6>
        <ul class="list-group list-group-flush   row link-color-default fs-14 lh-24">
            @foreach ($categories as $category)
                <li class="list-group-item ">
                    <a href="{{ route('blog.category', $category->id)}}">
                        {{$category->name}}
                    </a>
                </li>
            @endforeach
        </ul>
        <hr>
        <h6 class="sidebar-title">{{ __('lang.TAGS') }}</h6>
        <ul class="list-group list-group-flush   row link-color-default fs-14 lh-24">
            @foreach ($tags as $tag)
                <li class="list-group-item">
                    <a class="badge " href="{{ route('blog.tag',$tag->id) }}">{{$tag->name}}</a>
                </li>
            @endforeach
        </ul>
        <hr>
        {{-- <h6 class="sidebar-title">About</h6>
        <p class="small-3">TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.</p> --}}
    </div>

</div>

