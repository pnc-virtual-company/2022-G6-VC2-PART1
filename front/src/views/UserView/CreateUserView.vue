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
      if (rol=='teacher'){
        axios.post('createUser',newUser)
        .then(()=>{
          console.log('User Created successfully');
          alert('User Create Sucessfuly')
        })
        .catch(function (error) {
          console.log(error)
          // alert(JSON.stringify(newUser))
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
