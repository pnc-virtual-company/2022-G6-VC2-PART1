<template>
  <FormCreateUser @create-user="createNewUser"/>
</template>
<script>
import FormCreateUser from "../components/user_admin/FormCreateUser.vue";
import axios from '../axios-http';
export default {
  components:{
     FormCreateUser,
  },
  data(){
    return{

    }
  },
  methods:{
    createNewUser(newUser, rol){
      console.log('good morning teacher');
      console.log(rol);
      if (rol=='teacher'){
        console.log(newUser);
        axios.post(process.env.VUE_APP_API_URL+'createUser',newUser).then(response=>{
          console.log(response);
        })
      }else{
        axios.post(process.env.VUE_APP_API_URL+'students/register',newUser).then(response=>{
          console.log(response);
        })
        console.log(newUser);
      }
    }
  }
}
</script>
