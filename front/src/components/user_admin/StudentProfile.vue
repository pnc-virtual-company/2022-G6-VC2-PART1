<template>
  <div class="contain">
    <div class="contain-left">
      <div class="contain-img">
        <img :src="'http://127.0.0.1:8000/storage/images/'+student.picture"  alt="">
      </div>
      <div class="user-name">
        <h2>{{ student.name }}</h2>
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
            <li @click="pageUpdatPassword">Password Reset</li>
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
            <p>{{ student.name }}</p>
          </div>
          <div class="gender flex">
            <strong>User Gender: </strong>
            <p>{{ student.gender }}</p>
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
            <p>{{ student.phone_number }}</p>
          </div>
          <div class="email flex">
            <strong>User Email: </strong>
            <p>{{ student.email }}</p>
          </div>
        </div>
        <div>
          <button class="btn-back">
            <router-link class="link-a" to="/" @click="$router.go(0)"
              >Back</router-link
            >
          </button>
        </div>
      </div>

      <div class="update-detail" v-if="onUpdate">
        <h1>User Update Information</h1>
        <div class="name input">
          <strong>User Name</strong><br />
          <input type="text" v-model="name" />
        </div>
        <div class="phone input">
          <strong>phone number</strong><br />
          <input type="number" v-model="phone_number" />
        </div>
        <div class="email input">
          <strong>User Email</strong><br />
          <input type="text" v-model="email" />
        </div>
        <div class="email input">
          <strong>Bacth</strong>
         <input
                type="text"
                placeholder="input your bacth"
                v-model="bacth" />
        </div>

        <div class="flex">
          <div class="select">
            <strong>User Gender</strong><br />
            <select name="" id="" v-model="gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="select">
            <strong>Class</strong><br />
            <select name="" id="" v-model="class_room">
              <option value="Web 2022 A">Web A</option>
              <option value="Web 2022 B">Web B</option>
              <option value="SNA 2022">SNA</option>
            </select>
          </div>
         
        </div>

        <div class="button-group">
          <button class="update" @click="updataStudent">Update</button>
          <button class="concel">
            <router-link class="link-a" to="/" @click="$router.go(0)"
              >Back</router-link
            >
          </button>
        </div>
      </div>

      <div class="updae_password" v-if="onReset">
        <div class="title">
          <h1>RESET PASSWORD</h1>
        </div>
        <div class="previouse_password">
          <strong>Previous Password</strong>
          <input
            type="password"
            name=""
            id=""
            placeholder="previous password !!"
            v-model="oldPassword"
            required
          />
        </div>
        <div class="new_password">
          <strong>New Password</strong>
          <input
            type="password"
            name=""
            id=""
            placeholder="new password !!"
            v-model="newPassword"
            required
          />
        </div>
        <div class="conform_password">
          <strong>Confirm Password</strong>
          <input
            type="password"
            name=""
            id=""
            placeholder="confirm password !!"
            v-model="confirmPassword"
            required
          />
        </div>
        <div class="button_group">
          <button @click="resetPassword">Reset</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "@/api/api";

export default {
  props: {
    student: Array,
  },
  data() {
    return {
      onAccount: true,
      onUpdate: false,
      onReset: false,
      name: "",
      email: "",
      gender: "",
      class_room: "",
      bacth: "",
      phone_number: "",
      /**
       * PASSWORD DATA
       */
      oldPassword: "",
      newPassword: "",
      confirmPassword: "",
    };
  },
  methods: {
    pageAccount() {
      this.onAccount = true;
      this.onUpdate = false;
      this.onReset = false;
    },
    pageUpdate() {
      this.onAccount = false;
      this.onUpdate = true;
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
    updataStudent() {
      let student = {
        name: this.name,
        email: this.email,
        gender: this.gender,
        class_room: this.class_room,
        bacth: this.bacth,
        phone_number: this.phone_number,
      };
      let id = JSON.parse(localStorage.getItem("studentid"));
      axios.post("students/" + id, student).then((res) => {
        console.log(res.data);
      });
      this.onAccount = true;
      this.onUpdate = false;
    },
    resetPassword() {
      if (this.newPassword == this.confirmPassword) {
        let id = JSON.parse(localStorage.getItem("studentid"));
        let password = {
          oldPassword: this.oldPassword,
          newPassword: this.newPassword,
        };
        axios
          .patch("students/" + id, password)
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
.contain .contain-right .update-detail .flex .select select {
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
        RESET PASSWORD
     */
.previouse_password,
.new_password,
.conform_password,
.button-group,
.button_group {
  width: 80%;
  margin-top: 10px;
}
.previouse_password input,
.new_password input,
.conform_password input {
  width: 100%;
  padding: 10px;
  font-size: 1.1rem;
  margin-top: 5px;
  border: none;
  box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
    rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
}
.updae_password {
  margin-top: 20px;
}
.button_group button {
  width: 30%;
  padding: 10px;
  font-size: 1.1rem;
  background: #05b2e9;
  border: none;
  border-radius: 3px;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
</style>
