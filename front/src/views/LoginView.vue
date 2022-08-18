<template>
    <FormUserLogin @data-login="loginAccount"/>
    <button @click="getdata">get users</button>
</template>


<script>
// import { defineComponent } from '@vue/composition-api'
import axios from '../axios-http'
import api from '../api/api'
import FormUserLogin from '@/components/log_in/FormUserLogin.vue' 

export default{
    components:{
        FormUserLogin,
    },
    data() {
        
    },
    methods:{
        loginAccount(email, password){
            // console.log('HEllo world how are you?');
            // console.log(email, password);
            axios.post(process.env.VUE_APP_API_URL+'login', {'email':email, 'password':password}).then(response=>{
                localStorage.setItem('token', response.data.token)
                console.log(response);
                api(response.data.token)
            })
        },
        getdata(){
            axios.get(process.env.VUE_APP_API_URL+'users')
            .then(res => {console.log(res.data);
        })
  }
    }
}
</script>
