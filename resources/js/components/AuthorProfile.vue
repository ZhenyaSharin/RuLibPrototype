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
            <vue-book-item v-for="book in books" :book="book" v-bind:key="book.Id" />
        </div>
        <div v-else class="author-books-title">
            Список литературы пока пуст...:(
        </div>
        <hr class="welcome-hr" />
        <div class="welcome-books-title">
            Другие писатели
        </div>
        <div class="welcome-writers-list d-flex justify-content-center flex-wrap">
            <vue-author-item v-for="author in authors" :author="author" v-bind:key="author.Id" />
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
                // surname: this.author.Last_name,
                authors: [],
                books: [],
                authorJSON: {
                    id: ''
                },
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