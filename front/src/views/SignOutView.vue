<template>
<div class="card">
  <div class="card-login"></div>
  <div v-for="user in name" :key="user" class="card-title">
  <ul>
    {{user.email}}
    {{user.password}}
  </ul>
  </div>
  <FormUserSignOut />
 </div>
</template>

<script>
import FormUserSignOut from "../components/signout/FormUserSignOut.vue";
import axios from "../axios-http";
export default {
  components:{
    FormUserSignOut,
  },


  signOut(){
        // localStorage.removeItem('user-role');
        localStorage.setItem('user-role', '')
        localStorage.removeItem('user');
        localStorage.removeItem('email');
        this.checkForUserRole()
  },
  loginUser(object) {
    axios.post(process.env.VUE_APP_API_URL+'login', object)
    .then(res => {
      console.log('Hello world');
      console.log(res.data);
      // this.getLogin();
      this.getdata()
    });
  },
  getdata(){
    axios.get(process.env.VUE_APP_API_URL+'users')
    .then(res => {
      console.log(res.data);
      // this.getLogin();
    });
  }
}
</script>
