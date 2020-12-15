<template>
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
                <div class="welcome-writers-desc mt-4">
                    На нашем портале Вы найдете все лучшие произведение русских классиков. Это наш литературный гений, это бесценное наследство на все нынешние и грядущие поколения. Погрузитесь в мир классической литературы и откройте для себя неоценимое творческое великолепие великих умов нашей истории.
                </div>
                <hr class="welcome-hr" />
                <div class="welcome-writers-title">
                    Писатели
                </div>
                <div class="welcome-writers-list d-flex justify-content-center flex-wrap">
                    <div v-for="author in authors" class="writer-item d-flex flex-column justify-content-end">
                        <div class="writer-item-img d-flex justify-content-center align-items-center">
                            <a :href="'/authors/'+ author.Link">
                                <img :src="author.Image" :alt="author.Last_name + '- портрет'">
                            </a>
                        </div>
                        <div class="writer-item-orangeline"></div>
                        <div class="writer-item-name">
                            {{ makeWithInitials(author.Last_name, author.First_name, author.Middle_name) }}
                        </div>
                        <div class="writer-item-link">
                            <a :href="'/authors/'+ author.Link">
                                <div class="item-link-green">
                                    перейти
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="welcome-hr" />
                <div class="welcome-books-title">
                    Книги
                </div>
                <div class="welcome-books-list d-flex justify-content-center flex-wrap">
                    <div class="book-item" v-for="book in books">
                        <div class="book-item-img d-flex justify-content-center">
                            <a :href="'/'+ book.Link">
                                <img :src="book.Image" :alt="book.Title + '- обложка'">
                            </a>
                        </div>
                        <div class="book-item-orangeline"></div>
                        <div class="writer-item-name">
                            {{ makeWithInitials(book.Author.Last_name, book.Author.First_name, book.Author.Middle_name) }}
                        </div>
                        <div class="book-item-name">
                            {{ book.Title }}
                        </div>
                        <div class="book-item-link">
                            <a :href="'/'+ book.Link">
                                <div class="item-link-green">
                                    Читать
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="welcome-hr" />
                <div class="morebooks">
                    <a href="#">
                        <div class="morebooks-btn">
                            ещё книги
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        // props:['places'],
        data() {
            return {
                is_refresh: true,
                authors: [],
                books: []
            }
        },
        mounted() {
            // this.update();
            this.authorsList();
            this.randomBookList();
        },
        methods:{
            // update: function(removed) {
            //     this.is_refresh = true;
            //     this.places = [];
            //     axios.get('/laraapi/places').then((response) => {
            //             this.places = response.data;
            //             this.is_refresh = false;
            //         });
            // }
            authorsList: function() {
                axios.post('/api/getallauthors').then((response) => {
                    this.authors = response.data.result;
                });
            },
            randomBookList: function() {
                axios.post('/api/getsomebooks').then((response) => {
                    this.books = response.data.result;
                });
            },
            makeWithInitials: function(surname, name, patronymic)
            {
                var n;
                n = name.substr(0, 1).toUpperCase();
                if (patronymic !== '') {
                    return surname + ' ' + n + '.' + patronymic.substr(0, 1).toUpperCase() + '.';
                } else {
                    return surname + ' ' + n + '.';
                }
            }
        }
    }
</script>