<template>
    <div class="book-item">
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
</template>
<script>
    export default {
        props:['book'],
        methods:{
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