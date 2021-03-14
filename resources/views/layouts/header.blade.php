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
                            <input type="text" name="headsearch" id="hs-input" placeholder="Поиск...">
                        </div>
                        <div class="headsearch-button">
                            <i class="fa fa-search fa-lg"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center ml-4">
                        @guest
                        <a href="#" data-toggle="modal" data-target="#signin__modal">
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

<div class="modal fade" id="signin__modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Войдите или зарегистрируйтесь
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button> -->
                @if (Route::has('register'))
                    <a href="" class="btn btn-primary">
                        {{ __('Зарегистрироваться') }}
                    </a>
                @endif
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        {{ __('Войти') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signout__modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Modal title
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ __('Отмена') }}
                </button>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Выйти') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
            </div>
        </div>
    </div>
</div>