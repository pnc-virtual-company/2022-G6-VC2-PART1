<template>
  <div class="contain">
    <div class="contain-form">
        <h3>Create New Account</h3>
        <div class="card-form">
            user name<input type="username" placeholder="username *" v-model="name" />
            email<input type="email" placeholder="Email Address *" v-model="email" />
            password<input type="password" placeholder="Your Password *" v-model="password" />
        </div>
        <div class="select">
            <div class="gender1">
                <div class="gender">
                    <select name="" id="" v-model="gender">
                        <option value="male">Male</option>
                        <option value="male">Female</option>
                    </select>
                </div>
<<<<<<< HEAD
                <div class="choose-class">
                    <select name="" id="">
                        <option value="class">Class web A</option>
                        <option value="class">Class web B</option>
                        <option value="class">Class SNA A</option>
                    </select>
                </div>
            </div>

=======
                <!-- <div class="age">
                    <input type="number" placeholder="Your Age *" />
                </div> -->
                <div class="teacherAndstudent">
                   <div>
                       <input type="radio" name="school" value="student" v-model="rol" @change="hideShowClass">Student
                   </div>
                   <div>
                       <input type="radio" name="school" value="teacher" v-model="rol" @change="hideShowClass">Teacher
                   </div>
               </div>
            </div>
            <div class="choose" v-if="hideShowClass">
                <select name="" id="" v-model="class_room">
                    <option value="Web_2022A">Class web A</option>
                    <option value="Web_2022B">Class web B</option>
                    <option value="SNA">Class SNA A</option>
                </select>
            </div>
>>>>>>> b07019ea00c71694f8faec1f4beefcd8c320bae6
           
        </div>
        <div class="submit">
<<<<<<< HEAD
          <input class="submit-client" type="submit" value="Sign up" @click="$emit('create-user',{name:this.name, email:this.email, password:this.password, gender:this.gender})"/>
=======
          <button class="submit-client" type="submit" @click.prevent="createUser">Sign up</button>
>>>>>>> b07019ea00c71694f8faec1f4beefcd8c320bae6
       </div>
    </div>
  </div>
</template>
<script>
import axios from '../../axios-http'
const URL_USER =process.env.VUE_APP_API_URL+ "createUser"
const URL_STUDENT = process.env.VUE_APP_API_URL+"students/register"
export default{
    data(){
        return {
            rol:'',
            name:'',
            email:'',
            password:'',
            gender:'',
            class_room:''
        }
    },
    computed:{
        /**
         * FUNTION HIDE&SHOW CLASS
         */
        hideShowClass(){
            if (this.rol=='student'){
                return true
            }
            return false
        }
    },
    methods:{
        /**
         * FUNCTION CREATE USER 
         */
        createUser(){
            if (this.rol=='teacher'){
                let newUser={
                    name:this.name,
                    email:this.email,
                    password:this.password,
                    gender:this.gender
                }
                axios.post(URL_USER,newUser)
            }else{
                let newUser={
                    name:this.name,
                    email:this.email,
                    password:this.password,
                    gender:this.gender,
                    class_room:this.class_room
                }
                axios.post(URL_STUDENT,newUser)
            }
        }
    }

}
</script>
<style scoped>
.contain {
    margin-top: 80px;
    box-sizing: border-box;
    width: 100%;
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
.select{
    width: 100%;
}
.select .teacherAndstudent{
    width: 100%;
    font-size: 12px;
    align-items: center;
    justify-content: space-evenly;
    display: flex;
    margin-bottom: 10px;
}
.gender1{
    display: flex;
    justify-content:space-between;
    width: 100%;
    margin-top:15px;

}
.gender1 .gender{
    width:48%;
}
.gender1 .gender select{
    width:100%;
}
<<<<<<< HEAD
.gender1 .choose-class{
=======
/* .gender1 .age{
>>>>>>> b07019ea00c71694f8faec1f4beefcd8c320bae6
     width:48%;
}
.select .gender1 .choose-class select{
    box-sizing: border-box;
    padding: 8px;
    width: 100%;
} */
.submit-client {
  /* width: 75px;
  height: 25px; */
  padding:10px;
  width: 30%;
  border: none;
  margin-top:30px;
  border-radius: 3px;
  font-size: 15px;
  margin-right: 30px;
  background-color: rgb(19, 185, 149);
}
.submit-client:hover {
  background-color:  rgb(9, 146, 117);
}
</style>
