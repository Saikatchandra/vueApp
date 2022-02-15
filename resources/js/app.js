
require('./bootstrap');

window.Vue = require('vue').default;

import { createApp } from 'vue';
let app=createApp({})

// Vue Router Supporter 
import * as VueRouter from 'vue-router';

import { routes } from './router';


const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
  });
  
  app.use(router)

  import adminMaster from './components/admin/adminMaster.vue';
  
  app.component('admin-master' , adminMaster);


 

// const app = new Vue({
//     el: '#app',
//     router
// });
app.mount("#app")

