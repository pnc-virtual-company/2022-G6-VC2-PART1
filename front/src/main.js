import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import api from './api/api'

if(localStorage.token){
    api(localStorage.token);
}else{
    api(false)
}

createApp(App).use(router).mount('#app')
