<template>
  <div class="container" @submit.prevent>
    <div class="create-admin" v-if="create_role">
      <div class="left">
        <h1>Hello world! <br> How are you</h1>
        <button class="button-create-student" @click="isCreateUser">Create Student</button>
      </div>
      <div class="right">
        <div class="form">
          <form action="">
            <div class="card">
              <div class="head">
                <img src="https://media.istockphoto.com/vectors/young-man-anime-style-character-vector-id1188980757?k=20&m=1188980757&s=612x612&w=0&h=mchP5EsIbmDRCWs3k8N2xtDfjaMTF2DU3ahc_HPsSMw=" alt="">
               
              </div>
              <div class="body">
                <div class="name input">*Name <br><input type="text" placeholder="" class="my-input" v-model="name"></div>
                <div class="email input">*Email <br><input type="email" placeholder="" class="my-input" v-model="email"></div>
                <div class="gender input">*Gender <br>
                  <select class="input my-input" name="" id=""  v-model="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
              </div>
              <div class="footer">
                <div class="button-group">
                  <button class="orange" @click="checkValidationAdmin">Create</button>
                  <button class="blue" @click="clearnForm">Concell</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="create-student" v-if="!create_role">
      <div class="right">
        <div class="form">
          <form action="">
            <div class="card">
              <div class="head">
                <label for="image">
                  <img src="https://freesvg.org/img/1514826571.png" alt="">
                </label> 
                 <!-- <div class="test"> -->
                  <input type="file" @change="upload" hidden id="image">
                <!-- <button @click="addImage">upload</button> -->
                <!-- </div> -->
              </div>
              <div class="body">
                <div class="name input">*Name <br><input type="text" placeholder="" class="my-input" v-model="name"></div>
                <div class="email input">*Email <br><input type="email" placeholder="" class="my-input" v-model="email"></div>
                <div class="flex">
                  <div class="gender input">*Gender <br>
                    <select class="input my-input select" name="" id="" v-model="gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="phone input">*Phone Number <br>
                    <input type="text" class="input my-input" v-model="phone_number">
                  </div>
                </div>
                <div class="flex">
                  <div class="class input">*Class <br>
                    <input type="text" class="input my-input" v-model="class_room">
                  </div>
                  <div class="batch input">*Batch <br>
                    <input type="text" class="input my-input" v-model="batch">
                  </div>
                </div>
              </div>
              <div class="footer">
                <div class="button-group">
                  <button class="orange" @click="checkValidationStudent">Create</button>
                  <button class="blue" @click="clearnForm">Concell</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="left">
        <h1>Hello world! <br> How are you</h1>
        <button class="button-create-admin" @click="isCreateUser">Create Admin</button>
      </div>
    </div>
  </div>

</template>
<script>

export default {
  data() {
    return {
      name: "",
      email: "",
      password: '12345678',
      gender: "male",
      class_room: "",
      phone_number: "",
      picture:'',
      batch: "",
      name_empty: false,
      class_empty: false,
      batch_empty: false,
      phone_number_empty: false,
      email_empty: false,
      password_empty: false,
      create_role:true
    };
  },
  methods: {
    /**
     * @todo change form for user create user
     * @return new form for create user
     */
    upload(e){
        console.log(e.target.files[0]);
        this.picture=e.target.files[0]
    },
    addImage(){
      console.log("Hello this is ", this.picture);
    },
    isCreateUser(){
      if(this.create_role){
        this.create_role = false
      }else{
        this.create_role = true
      }
    },
    /**
     * @todo check validation of admin information
     */
    checkValidationAdmin() {
      // check validation email
      if (!/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email) || this.email == "") { this.email_empty = true; }
      // check validation name
      if (this.name.length == 0) { this.name_empty = true; }
      // check for create user
      if (!this.name_empty && !this.email_empty) {
        this.createAdmin()
      }
    },
    /**
     * @todo check validation of student information
     */
    checkValidationStudent() {
      // check validation email
      if (!/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email) || this.email == "") { this.email_empty = true; }
      // check validation name
      if (this.name.length == 0) { this.name_empty = true; }
      // check validation phone number
      if (this.phone_number.length < 8){ this.phone_number_empty = true }
      // check validation phone number
      if (this.phone_number.length < 8){ this.phone_number_empty = true }
      // check validation class
      if (this.class_room == '' ){ this.class_empty = true }
      // check validation batch
      if (this.batch == '' ){ this.batch_empty = true }
      // check for create user
      if (!this.name_empty && !this.email_empty && !this.phone_number_empty && !this.class_empty && !this.batch_empty) {
        // console.log('Where are you now?');
        this.createStudent()
      }
    },
    /**
     * @todo create new admin
     * @return new admin
     */
    createAdmin() {
        let newUser = {
          name: this.name,
          email: this.email,
          password: this.password,
          gender: this.gender,
          // picture: this.picture,
        };
        this.$emit("create-user", newUser, 'teacher');
        this.clearnForm
    },
    /**
     * @todo create new student
     * @return new student
     */
    createStudent() {
        let newUser = {
          name: this.name,
          email: this.email,
          password: this.password,
          gender: this.gender,
          class_room: this.class_room,
          phone_number: this.phone_number,
          picture: this.picture,
          bacth: this.batch,
        };
        this.$emit("create-user", newUser, 'student');
        console.log(newUser);
        this.clearnForm
    },
    /**
     * @todo clean form create
     */
    clearnForm(){
      this.name = "";
      this.email = "";
      this.phone_number = "";
      this.class_room = "";
      this.batch = "";
      this.picture= "";
    }
  },
};
</script>
<style scoped>
.container{
  align-items: center;
  justify-content: center;
  display: flex;
  width: 100%;
  height: 90.7vh;
  /* background: brown; */
}
.container .create-admin{
  width: 100%;
  align-items: center;
  justify-content: center;
  display: flex;
}
.button-create-student{
  background: #05B2E9;
  padding: 10px 20px;
  margin-top: 40px;
  border: none;
  border-radius: 4px;
}
.container .create-admin .left{
  width: 30%;
  text-align: center;
}
.container .create-admin .right{
  width: 30%;
}
.container .create-admin .right .form .card{
  width: 85%;
  padding: 30px;
  box-shadow: rgba(0, 0, 0, 0.402) 0px 1px 4px;
  border-radius: 5px;
}
.container .create-admin .right .form .card .head {
  align-items: center;
  justify-content: center;
  display: flex;
}
.container .create-admin .right .form .card .head img{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 2px solid rgb(207, 207, 207);
}
.container .create-admin .right .form .card .body .input{
  margin-top: 10px;
}
.container .create-admin .right .form .card .body .input .my-input{
  margin-top: 3px;
  padding: 7px;
  font-size: 16px;
  width: 100%;
  box-sizing: border-box;
  outline: none;
}
.container .create-admin .right .form .card .footer{
  margin-top: 10px;
}
.container .create-admin .right .form .card .footer .button-group{
  align-items: center;
  justify-content: center;
  display: flex;
  gap: 10px;
}
.container .create-student{
  width: 100%;
  align-items: center;
  justify-content: center;
  display: flex;
  /* display: none; */
}
.button-create-admin{
  background: #FFAD5C;
  padding: 10px 20px;
  margin-top: 40px;
  border: none;
  border-radius: 4px;
}
.container .create-student .left{
  width: 30%;
  text-align: center;
  margin-left: 60px;

}
.container .create-student .right{
  margin-left: 0px;
  width: 25%;
  /* background: blue; */
}
.container .create-student .right .form .card{
  /* background: burlywood; */
  width: 100%;
  padding: 30px;
  box-shadow: rgba(0, 0, 0, 0.395) 0px 1px 4px;
  border-radius: 5px;
}
.container .create-student .right .form .card .head {
  /* background: rgb(180, 222, 135); */
  align-items: center;
  justify-content: center;
  display: flex;
}
.container .create-student .right .form .card .head img{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 1px solid rgb(177, 177, 177);
}
.container .create-student .right .form .card .body .flex{
  margin-bottom: -20px;
  display: flex;
  gap: 10px;
}
.container .create-student .right .form .card .body .input{
  margin-top: 10px;
  width: 100%;
}
.container .create-student .right .form .card .body .input .my-input{
  margin-top: 3px;
  padding: 7px;
  font-size: 16px;
  width: 100%;
  box-sizing: border-box;
  outline: none;
}
.container .create-student .right .form .card .body .flex .select{
  width: 100%;
}
.container .create-student .right .form .card .footer{
  margin-top: 10px;
}
.container .create-student .right .form .card .footer .button-group{
  align-items: center;
  justify-content: center;
  display: flex;
  margin-top: 40px;
  gap: 10px;
}
.orange{
  background: #FFAD5C;
}
.blue{
  background: #05B2E9;
}
</style>
