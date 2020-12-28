<template>
    <div class="writer-item d-flex flex-column justify-content-end">
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
</template>
<script>
    export default {
        props:['author'],
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