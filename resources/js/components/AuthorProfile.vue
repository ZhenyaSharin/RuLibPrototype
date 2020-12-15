<template>
    <div class="container d-flex flex-column align-items-center">
        <div class="author-title">
            {{ author.Last_name }} {{ author.First_name }} {{ author.Middle_name }}
        </div>
        <div class="author-portrait d-flex justify-content-center align-items-center">
            <img :src="'/'+ author.Image" :alt="'портрет - '+ author.Last_name">
        </div>
        <br>
        <div class="author-books-title">
            Произведения автора:
        </div>
        <div v-if="books.length !== 0" class="welcome-books-list d-flex justify-content-center flex-wrap">
            <div class="book-item" v-for="book in books">
                <div class="book-item-img d-flex justify-content-center">
                    <a :href="'/'+ book.Link">
                        <img :src="'/'+ book.Image" :alt="book.Title + '- обложка'">
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
        <div v-else class="author-books-title">
            Список литературы пока пуст...:(
        </div>
        <hr class="welcome-hr" />
        <div class="welcome-books-title">
            Другие писатели
        </div>
        <div class="welcome-writers-list d-flex justify-content-center flex-wrap">
            <div v-for="author in authors" class="writer-item d-flex flex-column justify-content-end">
                <div class="writer-item-img d-flex justify-content-center align-items-center">
                    <a :href="'/authors/'+ author.Link">
                        <img :src="'/' + author.Image" :alt="author.Last_name + '- портрет'">
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
        <div class="morebooks">
            <a href="/">
                <div class="morebooks-btn">
                    ещё писатели
                </div>
            </a>
        </div>
    </div>
</template>
<script>
    export default {
        props:['author'],
        data() {
            return {
                surname: this.author.Last_name,
                authors: [],
                books: [],
                authorJSON: {
                    id: ''
                }
            }
        },
        mounted() {
            this.authorJSON.id = this.author.Id;
            this.authorsList(this.authorJSON);
            this.booksList(this.authorJSON);
        },
        created() {
            
        },
        methods:{
            booksList: function(json) {
                // /getauthorsbooks
                axios.post('/api/getauthorsbooks', json).then((response) => {
                    this.books = response.data.result;
                });
            },
            authorsList: function(json) {
                // let authorJSON = {id: authorid};
                axios.post('/api/getsomeanotherauthors', json).then((response) => {
                    this.authors = response.data.result;
                });
            },
            makeWithInitials: function(surname, name, patronymic) {
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