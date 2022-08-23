<template>
<div class="card">
  <div class="card-login"></div>
  <div v-for="user in name" :key="user" class="card-title">
  <ul>
    {{user.email}}
    {{user.password}}
  </ul>

  </div>


  <UserLogin @loginUser="loginUser"/>
  <button @click="getdata">get data</button>
 </div>
</template>

<script>
import UserLogin from "../components/log_in/FormUserLogin.vue";

export default {
  components:{
    UserLogin,
  },
  // data(){
  // },
  
}
</script>
