<div class="modal fade" id="signin__modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="signin__modal-content modal-content">
            <div class="modalhdr modal-header">
                <div>
                    Войдите или зарегистрируйтесь
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer d-flex flex-column justify-content-around">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="modalbtn btn modalbtn_reg">
                        {{ __('Зарегистрироваться') }}
                    </a>
                @endif
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="modalbtn btn modalbtn_log">
                        {{ __('Войти') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>