require('./bootstrap');

// Vue import
import Vue from 'vue'

// Router settings
import VueRouter from 'vue-router'
import routes from './routes'
Vue.use(VueRouter)
const router = new VueRouter({
    mode: 'history',
    routes,
})

//Primary components
import App from './components/App'

// App declaration
const app = new Vue({
    el: '#app',
    components: {
        App,
    },
    router,
});
