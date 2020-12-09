@extends('layout')

@section('content')
<div class="welcome-main">
    <div class="welcome-top d-flex flex-column justify-content-center align-items-center">
        <span class="welcome-top-maintitle">
            Библиотека русской классики
        </span>
        <span class="welcome-top-subtitle">
            Публичная и полностью бесплатная библиотека популярной классической русской литературы.
        </span>
    </div>
    <div class="welcome-about">
        <div class="container d-flex justify-content-center">
            <div class="welcome-about-item d-flex justify-content-between">
                <div class="about-items d-flex flex-column align-items-center">
                    <div class="about-img about-img-popular">
                        
                    </div>
                    <div class="about-text">
                        Самые популярные произведения русских классиков
                    </div>
                </div>
                <div class="about-items d-flex flex-column align-items-center">
                    <div class="about-img about-img-online">
                        
                    </div>
                    <div class="about-text">
                        Чтение произведений онлайн, без скачивания, без регистрации
                    </div>
                </div>
                <div class="about-items d-flex flex-column align-items-center">
                    <div class="about-img about-img-srch">
                        
                    </div>
                    <div class="about-text">
                        Удобный поиск по произведениям, размещенным на портале
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-writers">
        <div class="container d-flex flex-column align-items-center py-4">
            <div class="welcome-writers-desc">
                На нашем портале Вы найдете все лучшие произведение русских классиков. Это наш литературный гений, это бесценное наследство на все нынешние и грядущие поколения. Погрузитесь в мир классической литературы и откройте для себя неоценимое творческое великолепие великих умов нашей истории.
            </div>
            <div class="welcome-writers-title">
                Писатели
            </div>
        </div>
    </div>
</div>
@endsection
