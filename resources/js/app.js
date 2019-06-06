/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')
import Vuex from 'vuex'
import router from './router'
import { store } from './store.js'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import 'jquery/dist/jquery'
window.grapesjs = require('grapesjs')
import 'grapesjs/dist/css/grapes.min.css';
import grapesjs from 'grapesjs';

Vue.use(grapesjs)
Vue.use(Vuex)
Vue.directive('focus', {
    // When the bound element is inserted into the DOM...
    inserted: function (el) {
      // Focus the element
      el.focus()
    }
  })


const app = new Vue({
    el: '#app',
    mode: 'history',
    router,
    store,
});
