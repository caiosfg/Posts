import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import route from "./router"
import App from './App.vue'
import Header from './components/Header.vue';

const app = createApp(App)
const pinia = createPinia()

app.component('header-app', Header)
app.use(pinia)
app.use(route)
app.mount('#app')
