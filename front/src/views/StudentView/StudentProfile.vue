<template>
  <div class="contain">
    <div class="contain-left">
      <div class="contain-img">
        <img v-if="student.picture == null" class="circle" src="../../assets/user.png"  alt="">
        <img v-else class="circle" :src="'http://127.0.0.1:8000/storage/images/'+student.picture"  alt="">
      </div>
      <div class="user-name">
        <h2>{{student.name }}</h2>
      </div>
      <div class="contain-menu">
        <nav>
          <ul>
            <li class="" :class="{ onPage: onAccount }" @click="pageAccount">
              Account
            </li>
            <li class="" :class="{ onPage: onReset }" @click="pageUpdatPassword">Password Reset</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="contain-right">
      <div class="account-detail" v-if="onAccount">
        <div>
          <h1>User Information Detail</h1>
          <div class="name flex">
            <strong>User Name: </strong>
            <p>{{student.name}}</p>
          </div>
          <div class="gender flex">
            <strong>User Gender: </strong>
            <p>{{student.gender  }}</p>
          </div>
          <div class="Class-room flex">
            <strong>Class Room: </strong>
            <p>{{ student.class_room }}</p>
          </div>
          <div class="Class-room flex">
            <strong>Bacth: </strong>
            <p>{{ student.bacth }}</p>
          </div>
          <div class="Class-room flex">
            <strong>Phone Number: </strong>
            <p>{{student.phone_number}}</p>
          </div>
          <div class="email flex">
            <strong>User Email: </strong>
            <p>{{student.email}}</p>
          </div>
        </div>
        <div>
        </div>
      </div>

      <div class="update_password" v-if="onReset">
        <div class="title">
          <h1>RESET PASSWORD</h1>
        </div>
        <div class="previouse_password info">
          <strong>Previous Password</strong>
          <div class="flex">
          <input
          :type="showOldPassword ? 'text' : 'password'"
            name=""
            id=""
            placeholder="previous password !!"
            v-model="oldPassword"
            required
          />
          <i
              @click="oldPasswords"
              :class="showOldPassword ? 'fa fa-eye' : 'fa fa-eye-slash'"
              style="font-size: 17px"
            ></i>
          </div>
        </div>
        <div class="new_password info">
          <strong>New Password</strong>
          <div class="flex">
          <input
          :type="showNewPassword ? 'text' : 'password'"
            name=""
            id=""
            placeholder="previous password !!"
            v-model="newPassword"
            required
          />
          <i
              @click="newPasswords"
              :class="showNewPassword ? 'fa fa-eye' : 'fa fa-eye-slash'"
              style="font-size: 17px"
            ></i>
          </div>
        </div>
        <div class="conform_password info">
          <strong>Confirm Password</strong>
          <div class="flex">
          <input
          :type="showConfirmPassword ? 'text' : 'password'"
            name=""
            id=""
            placeholder="previous password !!"
            v-model="confirmPassword"
            required
          />
          <i
              @click="confirmPasswords"
              :class="showConfirmPassword ? 'fa fa-eye' : 'fa fa-eye-slash'"
              style="font-size: 17px"
            ></i>
          </div>
        </div>
        <div class="button_group">
          <button class="submit" @click="resetPassword">Reset</button>
          <button class="cancel" @click="this.$router.go()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "@/api/api";

export default {
  data() {
    return {
      onAccount: true,
      onReset: false,
      name: "",
      email: "",
      gender: "",
      class_room: "",
      bacth: "",
      phone_number: "",

       ///reset//
       showOldPassword: "",
      showNewPassword: "",
      showConfirmPassword:"",
      /**
       * PASSWORD DATA
       */
      oldPassword: "",
      newPassword: "",
      confirmPassword: "",
      student:JSON.parse(localStorage.getItem("user"))
    };
  },
  methods: {
    oldPasswords() {
      this.showOldPassword = !this.showOldPassword;
      
    },
    newPasswords(){
      this.showNewPassword = !this.showNewPassword;
      
    },
    confirmPasswords(){
      this.showConfirmPassword = !this.showConfirmPassword;

    },
    pageAccount() {
      this.onAccount = true;
      this.onUpdate = false;
      this.onReset = false;
    },
    pageUpdate() {
      this.onAccount = true;
      this.onReset = false;
      this.name = this.student.name;
      this.email = this.student.email;
      this.gender = this.student.gender;
      this.class_room = this.student.class_room;
      this.bacth = this.student.bacth;
      this.phone_number = this.student.phone_number;
    },
    pageUpdatPassword() {
      this.onAccount = false;
      this.onUpdate = false;
      this.onReset = true;
    },
    // ___________ Updata Student____________
    resetPassword() {
      if (this.newPassword == this.confirmPassword) {
        let id = JSON.parse(localStorage.getItem("user")).id;
        let password = {
          oldPassword: this.oldPassword,
          newPassword: this.newPassword,
        };
        console.log(id)
        axios
        .patch("resetStudentPassword/" + id, password).then(()=>{
          alert("Reset succefully!")
          localStorage.removeItem('studentid')
          localStorage.removeItem('email')
          localStorage.removeItem('user')
          localStorage.removeItem('user-role')
          localStorage.removeItem('token')
          this.$router.go()
        })
        .catch(alert("please check your old password"));
      } else {
        alert("Please check your confirm password");
      }
    },
  },
};
</script>

<style scoped>
.contain {
  display: flex;
  width: 70%;
  margin: 50px auto;
  height: 78vh;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  border-radius: 4px;
}
.contain .contain-left {
  width: 40%;
  border-right: 1px solid rgba(210, 210, 210, 0.754);
}
.contain .contain-left .contain-img {
  align-items: center;
  justify-content: center;
  display: flex;
  padding: 15px 10px;
}
.contain .contain-left .contain-img img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  border: 1px solid rgb(162, 162, 162);
}
.contain .contain-left .user-name {
  text-align: center;
  margin: 20px 0;
  padding: 0 10px;
}
.contain .contain-left .contain-menu nav ul li {
  border-bottom: 1px solid rgb(217, 217, 217);
  list-style: none;
  padding: 15px;
}
.onPage {
  background: #05b2e9;
}
.contain .contain-left .contain-menu nav ul li:hover {
  background: #05b2e9;
  cursor: pointer;
}
.contain .contain-right {
  width: 60%;
  padding: 50px;
}
/* on menu account */
.contain .contain-right .account-detail {
  margin-top: 30px;
  line-height: 40px;
}
.contain .contain-right .account-detail .flex {
  align-items: center;
  justify-content: start;
  display: flex;
}
.contain .contain-right .account-detail .flex p {
  text-indent: 20px;
}
/*
        RESET PASSWORD
*/
.contain .contain-right .update_password{
  width: 100%;
}
.contain .contain-right .update_password .info{
  width: 100%;
  margin-top: 20px;
}
.contain .contain-right .update_password .info .flex input{
  width: 93.5%;
  padding: 9px 15px;
  margin-top: 5px;
  outline: none;
  font-size: 16px;
}
.contain .contain-right .update_password .info .flex i{
  margin-left: -30px;
}
.contain .contain-right .update_password .button_group{
  margin-top: 20px;
}
.contain .contain-right .update_password .button_group button{
  padding: 8px 25px;
  border: none;
  border-radius: 3px;
}
.contain .contain-right .update_password .button_group .submit{
  background: #05b2e9;
}
.contain .contain-right .update_password .button_group .cancel{
  background: #ffad5c;
  margin-left: 20px;
}

.link-a {
  text-decoration: none;
}

.btn-back {
  align-items: center;
  appearance: button;
  background-color: #05b2e9;
  border-radius: 3px;
  border-style: none;
  box-shadow: rgba(255, 255, 255, 0.26) 0 1px 2px inset;
  box-sizing: border-box;
  color: rgb(0, 0, 0);
  cursor: pointer;
  display: flex;
  flex-direction: row;
  flex-shrink: 0;
  font-family: "RM Neue", sans-serif;
  font-size: 100%;
  line-height: 1.15;
  margin: 0;
  padding: 10px 21px;
  text-align: center;
  text-transform: none;
  transition: color 0.13s ease-in-out, background 0.13s ease-in-out,
    opacity 0.13s ease-in-out, box-shadow 0.13s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.btn-back:active {
  background-color: #006ae8;
}

.btn-back:hover {
  background-color: #1c84ff;
}
</style>
