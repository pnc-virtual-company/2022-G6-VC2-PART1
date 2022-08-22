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
import axios from "../axios-http";
export default {
  components:{
    UserLogin,
  },
  data(){
    return{
      userlogin:[],
    };
  },
  methods: {
  // getLogin() {
  //   http.get('name')
  //   .then(response => {
  //     this.userlogin = response.data;
  //   })
  // },
  loginUser(object) {
    axios.post(process.env.VUE_APP_API_URL+'login', object)
    .then(res => {
      console.log('Hello world');
      console.log(res.data);
      // this.getLogin();
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
}
</script>
