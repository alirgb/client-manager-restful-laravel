require('./bootstrap');

import { createApp } from "vue";
import router from './router'
import ClientsIndex from './components/clients/ClientsIndex'

createApp({
    components: {
        ClientsIndex
    }
}).use(router).mount('#app')