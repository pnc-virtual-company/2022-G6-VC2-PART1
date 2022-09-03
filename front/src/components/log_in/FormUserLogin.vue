<template>
  <div class="contain">
    <div class="contain-form" @submit.prevent>
      <form action="">
        <h2>User Login</h2>
        <div class="card-form">
          Email<input
            type="email"
            placeholder="Email Address *"
            v-model="email"
          /><label class="label">Password</label>
                <div class="flex">
                  <input
                    :type="showPassword ? 'text' : 'password'"
                    placeholder="Password"
                    v-model="password"
                  />
                  <i
                    @click="toggleShow"
                    :class="showPassword ? 'fa fa-eye' : 'fa fa-eye-slash'"
                  ></i>
                <div>
                  </div>
                </div>
          <div>
            Choose your role
            <div class="role">
              <div class="user-role">
                <input
                  type="radio"
                  name="role"
                  value="teacher"
                  v-model="role"
                />Teacher
              </div>
              <div class="user-role">
                <input
                  type="radio"
                  name="role"
                  value="student"
                  v-model="role"
                />Student
              </div>
            </div>
          </div>
        </div>
        <div class="submit" v-if="role == 'teacher'">
          <router-link to="/checkleave"
            ><button @click="storeDataUser">Log In</button></router-link
          >
        </div>
        <div class="submit" v-if="role == 'student'">
          <router-link to="/leaveList"
            ><button @click="storeDataUser">Log In</button></router-link
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "@/api/api";

export default {
  data() {
    return {
      email: "",
      role: "teacher",
      password: "",
      showPassword: false,
    };
  },
  methods:{
    toggleShow() {
      this.showPassword = !this.showPassword;
    },
    storeDataUser(){
      let dataLogin = {email:this.email, password:this.password}
      if(this.role == 'teacher'){
        axios.post('login', dataLogin).then(res=>{
          console.log(res.data);
          if(res.data.mas == 'success'){
            localStorage.setItem('token', res.data.token)
            localStorage.setItem('user-role', this.role)
            localStorage.setItem('email', this.email)
            axios.get('users').then(res=>{
              for (const user of res.data) {
                if(user.email == this.email){
                  localStorage.setItem('user', JSON.stringify(user))
                  this.$router.go()
                }
              }
            })
          }else{
            alert("Your Login not success. Please try again");
          }
        })
      }
      if(this.role == 'student'){
        axios.post('students/login', dataLogin).then(res=>{
          if(res.data.mas == 'success'){
            localStorage.setItem('token', res.data.token)
            localStorage.setItem('user-role', this.role)
            localStorage.setItem('email', this.email)
            axios.get('students').then(res=>{
              for (const user of res.data) {
                if(user.email == this.email){
                  localStorage.setItem('user', JSON.stringify(user))
                  this.$router.go()
                }
              }
            })
          }else{
            alert("Your Login not success. Please try again");
          }
        })
      }
    }
  }
}
</script>

<style scoped>
.contain {
  box-sizing: border-box;
  width: 100%;
  margin: auto;
  align-items: center;
  justify-content: center;
  display: flex;
}

.contain .description{
  margin-left: 50px;
  width: 40%;
  line-height: 50px;
}

.contain .contain-form {
  margin-top: 120px;
  width: 30%;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  padding: 20px;
}
h2 {
  color: black;
  font-size: 26px;
  text-align: center;
  margin: 25px 0;
}
.card-form {
  margin: auto;
  background: none;
  width: 100%;
  text-align: left;
}
input {
  margin-top: 5px;
  margin-bottom: 15px;
  width: 100%;
  padding: 10px;
  outline: none;
  font-size: 15px;
  box-sizing: border-box;
  border: 1px solid gray;
}
.role {
  align-items: center;
  justify-content: space-evenly;
  display: flex;
}
.role .user-role {
  align-items: center;
  display: flex;
}
/* .role .user-role input {
  margin: 20px;
  align-items: center;
  display: flex;
  font-size: 16px;
} */
.flex {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.flex i{
  margin-left: -40px;
  margin-top: -10px;
}
.none {
  border: none;
}
.boder {
  border: 1px solid;
}
button{
  width: 100%;
  font-size: 16px;
  padding: 8px;
  background: #05b2e9;
  border: none;
  cursor: pointer;
}
</style>
