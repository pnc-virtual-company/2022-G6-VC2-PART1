<template>
  <FormCreateUser @create-user="createNewUser"/>
</template>
<script>
import FormCreateUser from "../../components/user_admin/FormCreateUser.vue";
import axios from '@/api/api';
export default {
  components:{
     FormCreateUser,
  },
  methods:{
    createNewUser(newUser, rol){
      console.log('User Created successfully');
      if (rol=='teacher'){
        axios.post('createUser',newUser)
        .then(()=>{
          alert('User Create Sucessfuly')
        })
        .catch(function () {
          alert(JSON.stringify(newUser))
      });
      }else{
        axios.post('students/register',newUser)
        .then(()=>{
          alert('User create Successfully')
        }).catch(function(){
          alert('Fail to create user')
        })
      }
    }
  }
}
</script>
