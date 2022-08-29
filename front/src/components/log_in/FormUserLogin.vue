<template>

  <div class="contain">
    <div class="description">
      <!-- <h1>WELCOME TO <br> LEAVE STUDENT SYSTEM MANAGEMENT</h1> -->
    </div>
    <div class="contain-form" @submit.prevent>
      <form action="">
        <h3>User Login</h3>
        <div class="card-form">
            email<input type="email" placeholder="Email Address *" v-model="email"/>
            password<input type="password" placeholder="Your Password *" v-model="password"/>
            <div>
              Choose your role
              <div class="role">
                <div class="user-role"><input type="radio" name="role" value="teacher" v-model="role">Teacher</div>
                <div class="user-role"><input type="radio" name="role" value="student" v-model="role">Student</div>
              </div>
            </div>
        </div>
        <div class="submit" v-if="role == 'teacher'">
          <router-link to="/checkleave"><button @click="storeDataUser">Log In</button></router-link>
        </div>
        <div class="submit" v-if="role == 'student'">
          <router-link to="/leaveList"><button @click="storeDataUser">Log In</button></router-link>
        </div>
      </form>

    </div>
  </div>
    <div class="footer">
      <small>Group 6 2022</small>
    </div>
</template>

<script>
import axios from '@/api/api'

export default{
  data() {
    return{
      email:'',
      role:'teacher',
      password:''
    }
  },
  methods:{
    storeDataUser(){
      let dataLogin = {email:this.email, password:this.password}
      if(this.role == 'teacher'){
        axios.post('login', dataLogin).then(res=>{
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
  height: 75vh;
  margin: auto;
  align-items: center;
  justify-content: space-between;
  display: flex;
}
.contain .description{
  /* color: #05B2E9; */
  margin-left: 50px;
  width: 40%;
  line-height: 50px;
}
.contain .description .h1{

}
.contain .contain-form {
  margin-top: 230px;
  width: 30%;
  margin-right: 150px;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  padding: 50px;
  background: white;
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
  background: white;
}
.card-form input {
  margin-bottom: 10px;
  width: 100%;
  padding: 10px;
  outline: none;
  box-sizing: border-box;
}
.submit button {
  width: 100%;
  height: 5vh;
  border: none;
  margin: auto;
  border-radius: 3px;
  font-size: 15px;
   background: #05B2E9;
}
.submit-client:hover {
   background: #05B2E9;
}
.role{
  align-items: center;
  justify-content: space-evenly;
  display: flex;
}
.role .user-role{
  /* margin-top: 20px; */
  align-items: center;
  /* justify-content: ; */
  display: flex;
}
.role .user-role input{
  margin: 20px;
  align-items: center;
  /* justify-content: ; */
  display: flex;
}

.footer{
  background: #05B2E9;
  height: 26px;
  width: 100%;
  padding-top: 130px;
}
.footer small{
  font-weight: bold;
  padding-left: 40px;
  /* margin-top: 250px; */
}

</style>
