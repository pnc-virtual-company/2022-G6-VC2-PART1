<template>
  <FormCreateUser @create-user="createNewUser"/>
</template>
<script>
import FormCreateUser from "../../components/user_admin/FormCreateUser.vue";
import axios from '../../axios-http';
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
      if (rol=='teacher'){
        axios.post(process.env.VUE_APP_API_URL+'createUser',newUser).then(res=>{
          console.log(res);
          alert('User Create Sucessfuly')
        })
      }else{
        axios.post(process.env.VUE_APP_API_URL+'students/register',newUser)
        alert('User Create Sucessfuly')
      }
    }
  }
}
</script>
