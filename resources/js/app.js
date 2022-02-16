require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'

const app = document.getElementById('app');

if(app) {
    createInertiaApp({
        resolve: name => require(`./Pages/${name}`),
        setup({ el, App, props, plugin }) {
            Vue.use(plugin)
            Vue.prototype.$route = route
    
            new Vue({
                render: h => h(App, props),
            }).$mount(el)
        },
    })
}
