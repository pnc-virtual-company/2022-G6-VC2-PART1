<template>
    <div v-if="checkForUserRole!=''">
      <nav>
        <!-- my logo -->
        <div class="left">
          <div class="logo">
            <img src="@/assets/logo.jpg" alt="" srcset="">
          </div>
        </div>
        <!-- Teacher menu -->
        <div class="nav_teacher nav"  v-if="checkForUserRole=='teacher'">
          <router-link to="/">List all students</router-link> 
          <router-link to="/checkleave">Cheack leave</router-link>
          <router-link to="/createuser">Create User</router-link>
          <!-- <router-view/> -->
        </div>  
        <!-- Student menu -->
        <div class="nav_student nav"  v-if="checkForUserRole=='student'">
          <router-link to="/request">New Request</router-link>
          <router-link to="/leaveList">List Leave</router-link>
          <!-- <router-view/> -->
        </div>
        <!-- menu right sigh -->
        <div class="right">
          <router-link to="/admin_profile"  v-if="checkForUserRole=='teacher'">
            <img v-if="user.picture == null" class="circle" src="@/assets/user.png"  alt="">
            <img v-else class="circle" :src="'http://127.0.0.1:8000/storage/images/'+user.picture"  alt="">
          </router-link>
          <router-link to="/studentprofile"  v-if="checkForUserRole=='student'">
            <img v-if="user.picture == null" class="circle" src="@/assets/user.png"  alt="">
            <img v-else class="circle" :src="'http://127.0.0.1:8000/storage/images/'+user.picture"  alt="">
          </router-link>
          <router-link to="/signout" class="logout">Sign Out</router-link>
        </div>  
      </nav>
      <router-view/>
    </div>
<!-- User login -->
  <LoginView v-if="checkForUserRole==''"/>

</template>

<style scoped>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
nav {
  align-items: center;
  justify-content: space-between;
  display: flex;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
nav a {
  font-weight: bold;
  color: #2c3e50;
  margin:10px 20px;
  text-decoration: none;
}
nav a.router-link-exact-active {
  color: #05B2E9;
}
a { 
    display: inline-block; 
    position: relative; 
    color: #05B2E9; 
} 
a:after { 
    content: ''; 
    position: absolute; 
    width: 100%; 
    transform: scaleX(0); 
    height: 2px; 
    bottom: 0; 
    left: 0; 
    background-color: #05B2E9; 
    transform-origin: bottom right; 
    transition: transform 0.25s ease-out; 
} 
a:hover:after { 
    transform: scaleX(1); 
    transform-origin: bottom left; 
}

nav .left {
  width: 30%;
  display: flex;
  justify-content: center;
  align-items: center;
}
nav .left .logo{
  width: 100%;
}

nav .left .logo img{
  width: 70px;
  height: 70px;
  margin-left: 10px;
}
nav .nav {
  width: 60%;
  align-items: center;
  justify-content: center;
  display: flex;
}
nav .right{
  width: 20%;
  align-items: center;
  justify-content: space-around;
  display: flex;
}
nav .right img{
  width: 50px;
  border-radius: 50%;
  border: 2px solid #05B2E9;
}
.logout{
  background: #05B2E9;  
  padding: 7px 20px;
  border-radius: 4px;
}
.logout:hover{
  background:none;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
</style>

  <script>
  import LoginView from '@/views/LoginView.vue'
  
  export default{
    components:{
      LoginView,
    },
    data() {
      return {
        checkUserRole:'',
        user:JSON.parse(localStorage.getItem('user'))
      }
    },
    methods:{
      signOut(){
        // localStorage.removeItem('user-role');
        localStorage.setItem('user-role', '')
        localStorage.removeItem('user');
        localStorage.removeItem('email');
        this.checkForUserRole()
      }
    },
    computed:{
      checkForUserRole(){
        let userRole = localStorage.getItem('user-role')
        console.log(userRole);
        if(userRole == 'teacher'){
          return 'teacher';
        }else if(userRole == 'student'){
          return 'student';
        }else{
          return ''
        }
      }
    },
  }
  </script>
