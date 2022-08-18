<template>
  <div class="contain">
    <div class="contain-form">
        <h3>User Login</h3>
        <div class="card-form">
            email<input type="email" placeholder="Email Address *" v-model="email"/>
            password<input type="password" placeholder="Your Password *" v-model="password"/>
        </div>
        <div class="submit">
          <!-- <button class="submit-client" type="submit" value="Sign in" @click="login">Log in</button> -->
          <input class="submit-client" type="submit" value="Sign in" @click="$emit('data-login', this.email, this.password)"/>
       </div>
    </div>
  </div>
</template>
<style scoped>
.contain {
      box-sizing: border-box;
      width: 100%;
      margin: auto;
      align-items: center;
      justify-content: center;
      display: flex;
    }
.contain .contain-form{
    width: 30%;
    border: 1px solid;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 20px;
}
h3 {
  color: black;
  font-size: 20px;
  padding-bottom: 15px;
}
.card-form {
  margin: auto;
  background: none;
  width: 100%;
  text-align: left;
}
.card-form input{
    margin-bottom: 10px;
    width: 100%;
    padding: 10px;
    outline: none;
    box-sizing: border-box;
}
.submit-client {
  width: 70px;
  height: 20px;
  border: none;
  border-radius: 3px;
  font-size: 15px;
  margin-right: 30px;
  background-color: rgb(19, 185, 149);
}
.submit-client:hover {
  background-color: rgb(9, 146, 117);
}
</style>

<script>
// import { defineComponent } from '@vue/composition-api'

export default{
  // data() {
  //   return{
  //     email:'',
  //     password:'',
  //   }
  // },
  // methods:{
  //   login(){
  //     this.$emit('data-login',this.email, this.password)
  //     console.log('Hello am in form login');
  //   }
  // }
}
</script>
