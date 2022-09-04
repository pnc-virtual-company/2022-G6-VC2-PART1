<template>
  <!-- <div class="previous-page">
    <button class="btn-back">
      <router-link class="link-a" to="/" @click="this.$router.go()">Back</router-link>
    </button>
  </div> -->
  <div class="contain">
    <div class="contain-left">
      <div class="contain-img" v-if="onAccount || onReset">
        <img v-if="admin.picture == null" class="circle" src="../../assets/user.png"  alt="">
        <img v-else class="circle" :src="'http://127.0.0.1:8000/storage/images/'+admin.picture"  alt="">
      </div>

      <div class="contain-img" v-if="onUpdate">
        <label for="image">
          <img v-if="previewImage != null" :src="previewImage" alt="">
          <img v-else src="../../assets/upload_image.jpg" alt="">
          <!-- <img v-else class="circle" :src="'http://127.0.0.1:8000/storage/images/'+admin.picture"  alt=""> -->
        </label> 
        <input type="file" @change="uploadImage" hidden id="image">
      </div>
      <div class="user-name">
        <h2>{{ admin.name }}</h2>
      </div>

      <div class="contain-menu">
        <nav>
          <ul>
            <li class="" :class="{ onPage: onAccount }" @click="pageAccount">
              Account
            </li>
            <li class="" :class="{ onPage: onUpdate }" @click="pageUpdate">
              Update
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
            <p>{{ admin.name }}</p>
          </div>
          <div class="gender flex">
            <strong>User Gender: </strong>
            <p>{{ admin.gender }}</p>
          </div>
          <div class="email flex">
            <strong>User Email: </strong>
            <p>{{ admin.email }}</p>
          </div>
        </div>

      </div>

      <div class="update-detail" v-if="onUpdate">
        <h1>User Update Information</h1>
        <div class="name input">
          <strong>User Name</strong><br />
          <input type="text" v-model="name" />
        </div>

        <div class="email input">
          <strong>User Email</strong><br />
          <input type="text" v-model="email" />
        </div>

        <div class="flex">
          <div class="select-gender">
            <strong>User Gender</strong><br />
            <select name="" id="" v-model="gender">
              <option selected value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
        <div class="button_group">
          <button class="submit" @click="updataAdmin">Update</button>
          <button class="cancel" @click="this.$router.go()">Cancel</button>
        </div>
      </div>
      <!-- _______________Updata_Password form___________ -->
      <div class="updae_password" v-if="onReset">
        <div class="title">
          <h1>RESET PASSWORD</h1>
        </div>
        <div class="previouse_password">
          <strong>Previous Password</strong>
          <div class="flex">
            <input :type="showOldPassword ? 'text' : 'password'" name="" id="" v-model="oldPassword" required/>
            <i @click="oldPasswords" :class="showOldPassword ? 'fa fa-eye' : 'fa fa-eye-slash'" style="font-size: 17px"></i>
          </div>
        </div>
        <div class="new_password">
          <strong>New Password</strong>
          <div class="flex">
            <input :type="showNewPassword ? 'text' : 'password'" name="" id="" v-model="newPassword" required />
            <i @click="newPasswords" :class="showNewPassword ? 'fa fa-eye' : 'fa fa-eye-slash'" style="font-size: 17px"></i>
          </div>
        </div>
        <div class="conform_password">
          <strong>Confirm Password</strong>
          <div class="flex">
            <input :type="showConfirmPassword ? 'text' : 'password'" name="" id="" v-model="confirmPassword" required/>
            <i @click="confirmPasswords" :class="showConfirmPassword ? 'fa fa-eye' : 'fa fa-eye-slash'" style="font-size: 17px" ></i>
          </div>
        </div>
        <div class="button_group">
          <button class="submit" @click="resetAdminPassword">Reset</button>
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
      onUpdate: false,
      onReset: false,
      name: "",
      email: "",
      gender: "male",
      picture:"",
      previewImage:null,

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
      /**
       * get user from local storage
       */
      admin: JSON.parse(localStorage.getItem("user")),
    };
  },
  methods: {
    uploadImage(e){
      this.picture=e.target.files[0]
      this.previewImage = URL.createObjectURL(this.picture);
    },
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
      this.onAccount = false;
      this.onUpdate = true;
      this.onReset = false;
      this.name = this.admin.name;
      this.email = this.admin.email;
      this.gender = this.admin.gender;
    },
    pageUpdatPassword() {
      this.onAccount = false;
      this.onUpdate = false;
      this.onReset = true;
    },
    // ___________ Update Admin____________
    updataAdmin() {
      let admin = {
        name: this.name,
        email: this.email,
        gender: this.gender,
      };

      /**
       * @todo get Id of user
       */
      let id = JSON.parse(localStorage.getItem("user")).id;

      /**
       * @todo update user information
       */
      axios.put("users/" + id, admin).then((res) => {
        console.log(res.data);
        console.log(id);
      });

      /**
       * @todo update user profile
       */
      let image = new FormData();
      if(this.picture != ''){
        image.append("_method",'PUT');
        image.append("picture", this.picture);
        axios.post("/users/profile/" + id, image).then((res) => {
          console.log(res.data);
        });
      }

      /**
       * @todo Get new data of user
       * @return new data
       */
      axios.get("/users/" + id).then((res) => {
        localStorage.setItem("user", JSON.stringify(res.data));
        this.$router.go()
      });

      this.onAccount = true;
      this.onUpdate = false;
    },
    // ___________________reset Password______________
    resetAdminPassword() {
      if (this.newPassword == this.confirmPassword) {
        let user = JSON.parse(localStorage.getItem("user"));
        let password = {
          oldPassword: this.oldPassword,
          newPassword: this.newPassword,
        };
        axios
          .patch("change/" + user.id, password)
          .then(()=>{
            alert("Change password succefully!!")
            localStorage.removeItem('studentid')
            localStorage.removeItem('email')
            localStorage.removeItem('user')
            localStorage.removeItem('user-role')
            localStorage.removeItem('token')
            this.$router.go()
          });
      } else {
        alert("Please check your confirm password");
      }
    },
  },
};
</script>

<style scoped>
.previous-page{
  width: 70%;
  margin: 0 auto;
  margin-top: 40px;
}
.contain {
  display: flex;
  width: 70%;
  margin: 60px auto;
  height: 68vh;
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
  align-items: start;
  justify-content: start;
}
/* on menu account */
.contain .contain-right .account-detail {
  margin-top: 30px;
  line-height: 40px;
  align-items: center;
  justify-content: start;
}
.contain .contain-right .account-detail .flex {
  align-items: center;
  justify-content: start;
  display: flex;
}
.contain .contain-right .account-detail .flex p {
  text-indent: 20px;
}
/* on menu update */
.contain .contain-right .update-detail .input {
  margin-top: 10px;
}
.contain .contain-right .update-detail .input input {
  padding: 10px;
  margin-top: 4px;
  font-size: 15px;
  width: 100%;
  outline: none;
  box-sizing: border-box;
  border: 1px solid rgb(213, 213, 213);
}
.contain .contain-right .update-detail .flex {
  display: flex;
  justify-content: space-between;
  width: 100%;
  /* gap: 50px; */
  /* background: tan; */
  box-sizing: border-box;
}
.contain .contain-right .update-detail .flex .select {
  margin-top: 10px;
  width: 43%;
  /* background: teal; */
  box-sizing: border-box;
  margin-top: 20px;
}
.contain .contain-right .update-detail .flex .select-gender {
  margin-top: 10px;
  width: 100%;
  box-sizing: border-box;
  margin-top: 10px;
}
.contain .contain-right .update-detail .flex select {
  border: 1px solid rgb(207, 207, 207);
  margin-top: 10px;
  width: 100%;
}
.contain .contain-right .update-detail .button-group {
  margin-top: 20px;
  width: 100%;
  gap: 20px;
}
.contain .contain-right .update-detail .button-group .concel {
  background: #ffad5c;
}
.contain .contain-right .update-detail .button-group .update {
  background: #05b2e9;
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
.account-detail {
  display: flex;
  justify-content: space-around;
  align-items: flex-end;
}
/*
  * RESET PASSWORD
*/
.previouse_password,
.new_password,
.conform_password,
.button-group,
.button_group {
  width: 100%;
  margin-top: 10px;
}
.previouse_password input,
.new_password input,
.conform_password input {
  width: 95%;
  padding: 10px;
  font-size: 1.1rem;
  margin-top: 5px;
  border: none;
  box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
    rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
}
i{
  margin-left: -70px;
  margin-right: 20px;
}
.updae_password {
  margin-top: 20px;
}
.flex {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.none {
  border: none;
}
.boder {
  border: 1px solid;
}
button{
  padding: 9px 30px;
  border: none;
  font-size: 15px;
  font-weight: bold;
  border-radius: 3px;
  margin-top: 15px;
}
.cancel{
  background: #ffad5c;
  margin-left: 10px;
}
.submit{
  background: #05b2e9;
}
</style>
