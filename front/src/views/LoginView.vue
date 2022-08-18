<template>
    <FormUserLogin @data-login="loginAccount"/>
</template>


<script>
// import { defineComponent } from '@vue/composition-api'
import axios from '../axios-http';
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
            })
        }
    }
}
</script>
