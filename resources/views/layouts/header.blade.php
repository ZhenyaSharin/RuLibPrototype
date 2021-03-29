<header id="top">
    <div class="container head-container d-flex">
        <div class="headsearch row">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <a href="/" class="logo">
                    ЛОГО
                </a>
            </div>
            <div class="col-10 d-flex justify-content-between align-items-center">
                <nav class="d-flex align-items-center flex-grow-1">
                    <ul class="headsearch__navul d-flex justify-content-between m-0 mr-4">
                        <li>
                            
                        </li>
                        <li>
                            <a href="#authors">ПИСАТЕЛИ</a>
                        </li>
                        <li>
                            <a href="#">КНИГИ</a>
                        </li>
                        <li>
                            <a href="#">КОНТАКТЫ</a>
                        </li>
                    </ul>
                </nav>
                <div class="d-flex">
                    <div class="d-flex">
                        <div class="headsearch-input pl-2">
                            <input type="text" name="headsearch" id="hs-input" placeholder="Поиск по сайту...">
                        </div>
                        <div class="headsearch-button">
                            <i class="fa fa-search fa-lg"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center ml-4">
                        @guest
                        <a href="#" data-toggle="modal" data-target="#signin__modal" title="Войти или зарегистрироваться">
                            <i class="fas fa-home fa-2x"></i>
                        </a>
                        @else
                        <a href="#" data-toggle="modal" data-target="#signout__modal">
                            <i class="fas fa-sign-out-alt fa-2x"></i>
                        </a>
                        @endguest
                    </div>
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

@include('modals.sign-or-reg-modal')

@include('modals.signout-modal')