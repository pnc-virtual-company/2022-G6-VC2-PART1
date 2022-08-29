<template>
  <div class="contain " @submit.prevent>
    <div class="contain-form">
      <h3>Create New Account</h3>
      <div class="card-form">
        user name<input
          type="username"
          placeholder="username *"
          v-model="name"
        />
        <small v-if="name_empty">Please check your user name</small><br />
        email<input type="text" placeholder="Email Address *" v-model="email" />
        <small v-if="email_empty">Please check your email</small><br />
            Gender<select name="" id="" v-model="gender">
              <option selected value="male">Male</option>
              <option value="male">Female</option>
            </select>
        <div class="choose" v-if="hideShowClass">
          phone number<input
            type="number"
            placeholder="Your phone number *"
            v-model="phone_number"
          />
        </div>

        <div class="bacth" v-if="hideShowClass">
         Bacth <input type="text" placeholder="input your bacth" v-model="bacth" />
        </div>
      </div>

      <div class="choose " v-if="hideShowClass">
            <!-- Gender<select name="" id="" v-model="gender">
              <option selected value="male">Male</option>
              <option value="male">Female</option>
            </select> -->

            Class<select name="" id="" v-model="class_room">
              <option checked value="Web A">Class web A</option>
              <option value="Web B">Class web B</option>
              <option value="SNA">Class SNA</option>
            </select>
 
      </div>
      

      <div class="gender1">
        <div class="teacherAndstudent flex">
          <input
            type="radio"
            name="school"
            value="student"
            v-model="rol"
            @change="hideShowClass"
          />Student

          <input
            type="radio"
            checked
            name="school"
            value="teacher"
            v-model="rol"
            @change="hideShowClass"
          />Teacher
        </div>
      </div>
      <div class="test">
    <input type="file" @change="upload">
    <button @click="addImage">upload</button>
  </div>
      <div class="submit">
        <button class="submit-client" type="submit" @click="checkValidation">
          Sign up
        </button>
      </div>
    </div>
  </div>

</template>
<script>

export default {
  data() {
    return {
      rol: "teacher",
      name: "",
      email: "",
      password: 12345678,
      gender: "",
      class_room: "",
      phone_number: "",
      bacth: "",
      picture:'',
      rol_empty: false,
      name_empty: false,
      email_empty: false,
      password_empty: false,
      gender_empty: false,

    };
  },
  computed: {
    /**
     * FUNTION HIDE&SHOW CLASS
     */
    hideShowClass() {
      if (this.rol == "student") {
        return true;
      }
      return false;
    },
  },
  methods: {
    /**
     * FUNCTION CREATE USER
     */
    upload(e){
        console.log(e.target.files[0]);
        this.picture=e.target.files[0]
    },
    addImage(){
      console.log("Hello this is ", this.picture);
    },
    checkValidation() {
      if (
        !/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
          this.email
        ) ||
        this.email == ""
      ) {
        this.email_empty = true;
      }
      if (this.password.length < 8) {
        this.password_empty = true;
      }
      if (this.name.length == 0) {
        this.name_empty = true;
      }
      if (this.rol == "") {
        this.rol_empty = true;
      }
      if (this.gender == "") {
        this.gender_empty = true;
      }
      if (
        !this.rol_empty &&
        !this.name_empty &&
        !this.email_empty &&
        !this.password_empty &&
        !this.gender_empty
      ) {
        this.createUser();
      }
    },
    createUser() {
      if (this.rol == "teacher") {
        let newUser = {
          name: this.name,
          email: this.email,
          password: this.password,
          gender: this.gender,
          picture: this.picture,
        };
        this.$emit("create-user", newUser, this.rol);
        this.name = "";
        this.email = "";
        this.password = "";
        this.gender = "";
      } else {
        let newUser = {
          name: this.name,
          email: this.email,
          password: this.password,
          gender: this.gender,
          class_room: this.class_room,
          phone_number: this.phone_number,
          bacth: this.bacth,
          picture: this.picture,
        };
        this.$emit("create-user", newUser, this.rol);
        this.name = "";
        this.email = "";
        this.password = "";
        this.gender = "";
      }
    },
  },
};
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
.contain .contain-form {
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
.card-form input {
  margin-bottom: 10px;
  width: 100%;
  padding: 10px;
  outline: none;
  box-sizing: border-box;
}
.select {
  width: 100%;

}

.select .teacherAndstudent {
  width: 100%;
  font-size: 12px;
  align-items: center;
  justify-content: space-evenly;
  display: flex;
  margin-bottom: 10px;
}
.gender1 {
  display: flex;
  justify-content: space-between;
  width: 100%;
  margin-top: 15px;
}
.gender1 .gender {
  width: 48%;
}
.gender1 .gender select {
  width: 100%;
}

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
  padding: 10px;
  width: 30%;
  border: none;
  margin-top: 30px;
  border-radius: 3px;
  font-size: 15px;
  margin-right: 30px;
  background-color: rgb(19, 185, 149);
}
.submit-client:hover {
  background-color: rgb(9, 146, 117);
}
small {
  color: red;
}
.flex {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.choose{
  margin-top: 8px;

}
</style>
