
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
window.Vue.use(VueRouter);
 
import Home from './components/pages/Home.vue';
import StoriesCreate from './components/stories/StoriesCreate.vue';
import StoriesEdit from './components/stories/StoriesEdit.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const routes = [
    {
        path: '/',
        components: {
            home: Home
        }
    },
   // {path: '/admin/stories/create', component: StoriesCreate, name: 'createStory'},
    //{path: '/admin/stories/edit/:id', component: StoriesEdit, name: 'editStory'},
]
 
const router = new VueRouter({ routes })
 
const app = new Vue({ router }).$mount('#app')
 

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('home', require('./components/Home.vue'));
/*
const app = new Vue({
    el: '#app',
    data: {}
});
*/