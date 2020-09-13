@if ($paginator->hasPages())
    <nav class="flexbox mt-30">
        @if ($paginator->onFirstPage())
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> @lang('pagination.previous')</a>

        @else
            <a  href="{{ $paginator->previousPageUrl() }}" class="btn btn-white "><i class="ti-arrow-left fs-9 mr-4"></i>  @lang('pagination.previous')</a>

        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          <a class="btn btn-white" href="{{ $paginator->nextPageUrl() }}"> @lang('pagination.next') <i class="ti-arrow-right fs-9 ml-4"></i></a>
        @else
            <a class="btn btn-white disabled" >@lang('pagination.next') <i class="ti-arrow-right fs-9 ml-4"></i></a>
        @endif
    </nav>
@endif

