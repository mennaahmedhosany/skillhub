	@if($paginator->hasPages())
    <!-- pagination -->
    <div class="col-md-12">
        <div class="post-pagination">
            @if($paginator->onFirstPage())
            <a href="#" class=" btn disabled pagination-back pull-left">Back</a>
                @else
            <a href="{{$paginator->previousPageUrl()}}" class="pagination-back pull-left">Back</a>
            @endif
            <ul class="pages">
                {{-- @foreach ($elemants as $elemant )
                @if(is_array($element))
                @foreach ($elemants as $page =>$url )
                @if ($page == $paginator->currentpage())
                    <li class="active">{{$page}}</li>
                    @else
                    <li><a href="{{$url}}">{{$page}}</a></li>

                @endif
                    
                @endforeach --}}
                
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
            </ul>
            @if($paginator->hasMorePages())
            <a href="{{$paginator->nextPageUrl()}}" class="pagination-next pull-right">Next</a>
            @else
            <a href="#" class="btn disabled pagination-next pull-right">Next</a>
            @endif
        </div>
    </div>
    @endif
    <!-- pagination -->