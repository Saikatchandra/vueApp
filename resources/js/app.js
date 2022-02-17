
require('./bootstrap');

window.Vue = require('vue').default;

import { createApp } from 'vue';

import { createStore } from 'vuex'
import storeInfo from './store/store';

let app=createApp({})

// Create a new store instance.
const store = createStore(
  storeInfo
)


// SweetAlert support
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast;



// Vue Router Supporter 
import * as VueRouter from 'vue-router';

import { routes } from './router';


const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes,
  });
  
  app.use(router)
  app.use(store)

  import adminMaster from './components/admin/adminMaster.vue';
  
  app.component('admin-master' , adminMaster);

  app.mount("#app")

