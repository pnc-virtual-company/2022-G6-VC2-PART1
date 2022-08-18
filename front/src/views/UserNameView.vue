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
    createNewUser(userData){
      console.log(userData);
      axios.post(process.env.VUE_APP_API_URL+'createUser',userData).then(response=>{
        console.log(response);
      })
    }
  }
}
</script>
