import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import Header from './components/Header.vue';

const app = createApp(App)
app.component('header-app', Header)

app.mount('#app')
