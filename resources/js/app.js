/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Promise = require('es6-promise').Promise;

window.Vue = require('vue');

window.events = new Vue();

window.flash = function(message) {

    window.events.$emit('flash',message);
    
}



import VueRouter from 'vue-router'; 
// import Flash from './components/Flash.vue';
import Welcome from './components/Welcome.vue';
import AuthorProfile from './components/AuthorProfile.vue';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

window.Vue.use(VueRouter);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('vue-welcome', Welcome);
Vue.component('vue-author-profile', AuthorProfile);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const routes = [
    {
        path: '/',
        name: 'home',
        component: Welcome
    },
    {
        path: '/authors/',
        component: AuthorProfile
    }
]

const router = new VueRouter({ routes })


const vm = new Vue({
    el: '#app',
    router: router
});
