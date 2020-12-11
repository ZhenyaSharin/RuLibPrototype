<header>
    <div class="container head-container d-flex">
        <!-- <div class="row"> -->
<!--             <div class="col-md-2 appname">
                {{ config('app.name', 'Laravel') }}
            </div> -->
        <div class="headsearch d-flex justify-content-stretch">
            @if (Request::path() == '/')
            <a href="#" class="headback elem-hidden">
                <i class="fa fa-arrow-left fa-lg"></i>
            </a>
            @else 
            <a href="{{ url()->previous() }}" class="headback">
                <i class="fa fa-arrow-left fa-lg"></i>
            </a>
            @endif
            <div class="headsearch-input pl-2">
                <input type="text" name="headsearch" id="hs-input" placeholder="Поиск...">
            </div>
            <div class="headsearch-button">
                <i class="fa fa-search fa-lg"></i>
            </div>
        </div>
        <!-- </div> -->
    </div>
</header>