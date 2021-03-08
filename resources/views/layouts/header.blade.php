<header id="top">
    <div class="container head-container d-flex">
        <div class="headsearch d-flex justify-content-stretch row">
            <div class="col-3">
                <a href="/">ЛОГО</a>
            </div>
            <div class="col-9 d-flex">
                <nav>
                    <ul class="headsearch__navul d-flex">
                        <li>
                            <a href="#">ПИСАТЕЛИ</a>
                        </li>
                        <li>
                            <a href="#">КНИГИ</a>
                        </li>
                        <li>
                            <a href="#">КОНТАКТЫ</a>
                        </li>
                        <li>
                            <a href="#">ВОЙТИ</a>
                        </li>
                    </ul>
                </nav>
                <div class="headsearch-input pl-2">
                    <input type="text" name="headsearch" id="hs-input" placeholder="Поиск...">
                </div>
                <div class="headsearch-button">
                    <i class="fa fa-search fa-lg"></i>
                </div>
            </div>
        </div>
        @if (Request::path() != '/')
        <a class="getback" href="{{ url()->previous() }}">
            <i class="fa fa-arrow-left fa-lg"></i>&nbsp;НАЗАД
        </a>
        @endif
    </div>
</header>