import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
<<<<<<< HEAD
import api from './api/api'

if(localStorage.token){
    api(localStorage.token);
}else{
    api(false)
}

=======
>>>>>>> b07019ea00c71694f8faec1f4beefcd8c320bae6
createApp(App).use(router).mount('#app')
