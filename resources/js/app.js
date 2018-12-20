
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const store = new Vuex.Store({
    state: {
        item: {
            
        }
    },
    mutations: {
        setItem(state, obj) {
            state.item = obj;
        }
    }
});

Vue.component('top', require('./components/Top.vue'));
Vue.component('panel', require('./components/Panel.vue'));
Vue.component('box', require('./components/Box.vue'));
Vue.component('page', require('./components/Page.vue'));
Vue.component('table-list', require('./components/TableList.vue'));
Vue.component('breadcrumb', require('./components/Breadcrumb.vue'));
Vue.component('modal', require('./components/modal/Modal.vue'));
Vue.component('modallink', require('./components/modal/ModalLink.vue'));
Vue.component('formComponent', require('./components/FormComponent.vue'));
Vue.component('articlescard', require('./components/ArticlesCard.vue'));

import VueCkeditor from 'vue-ckeditor2';

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    mounted: function () {
        document.getElementById('app').style.display = 'block';
    },
    components: { VueCkeditor },
});
