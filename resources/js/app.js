import { createApp } from 'vue';
import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";

import 'bootstrap/dist/css/bootstrap.min.css'
import "@fortawesome/fontawesome-free/css/all.css";
import App from './App.vue'


let app = createApp(App)
const router = createRouter({
history: createWebHistory(),
routes: routes,
})
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/lara-light-green/theme.css'
app.use(router);
app.mount("#app")
app.use(router).use(PrimeVue);


import ToastService from 'primevue/toastservice';
app.use(ToastService);

