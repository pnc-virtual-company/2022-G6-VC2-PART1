<template>
  <div class="container" @submit.prevent>
    <!-- *************************** form for create teacher ************************ -->
    <div class="create-admin" v-if="create_role">
      <div class="left">
        <h1>NEW ADMIN ACCOUNT</h1>
        <br>
        <h4>To create new student account, please click on button below</h4>
        <div class="button">
          <button class="button-create-student" @click="isCreateUser">Create Student</button>
        </div>
      </div>
      <div class="right">
        <div class="form">
          <form action="">
            <div class="card">
              <div class="head">
                <!-- ++++++++++++ Upload teacher image +++++++++++++ -->
                <label for="image">
                  <img v-if="previewImage != null" :src="previewImage" alt="">
                  <img v-if="previewImage == null" src="../../assets/upload_image.jpg" alt="">
                </label> 
                <input type="file" @change="uploadImage" hidden id="image">
              </div>
              <!-- +++++++++++++++ User Information ++++++++++++++++ -->
              <div class="body">
                <div class="name input">*Name <br><input type="text" placeholder="" class="my-input" v-model="name"></div>
                <small class="danger" v-if="name_empty">Name require*</small>
                <div class="email input">*Email <br><input type="email" placeholder="" class="my-input" v-model="email"></div>
                <small class="danger" v-if="email_empty">Email require*</small>
                <div class="gender input">*Gender <br>
                  <select class="input my-input" name="" id=""  v-model="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
              </div>
              <div class="footer">
                <div class="button-group">
                  <!-- ++++++++++++++++++++ button create User ++++++++++++++++++++ -->
                  <button class="orange" @click="checkValidationAdmin">Create</button>
                  <!-- ++++++++++++++++++++ button concel create user +++++++++++++++++++ -->
                  <button class="blue" @click="clearnForm">Concell</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- ************************ form for create student ************************ -->
    <div class="create-student" v-if="!create_role">
      <div class="right">
        <div class="form">
          <form action="">
            <div class="card">
              <!-- ++++++++++++ Upload teacher image +++++++++++++ -->
              <div class="head">
                <label for="image">
                  <img v-if="previewImage != null" :src="previewImage" alt="">
                  <img v-if="previewImage == null" src="../../assets/upload_image.jpg" alt="">
                </label> 
                <input type="file" @change="uploadImage" hidden id="image">
              </div>
              <!-- +++++++++++++++ User Information ++++++++++++++++ -->
              <div class="body">
                <div class="name input">*Name <br><input type="text" placeholder="" class="my-input" v-model="name"></div>
                <small class="danger" v-if="name_empty">Name require*</small>
                <div class="email input">*Email <br><input type="email" placeholder="" class="my-input" v-model="email"></div>
                <small class="danger" v-if="email_empty">Email require*</small>
                <div class="flex">
                  <div class="gender input">*Gender <br>
                    <select class="input my-input select" name="" id="" v-model="gender">
                      <option value="male" selected>Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="phone input">*Phone Number <br>
                    <input type="number" class="input my-input" v-model="phone_number">
                    <small class="danger" v-if="phone_number_empty">phone_number require*</small>

                    <input type="text" class="input my-input" v-model="phone_number">

                  </div>
                </div>
                <div class="flex">
                  <div class="class input"><br>
                  <label for="">*Class </label>
                    <input type="text" class="input my-input" v-model="class_room">
                    <small class="danger" v-if="class_empty">Class require*</small>
                  </div>
                  <div class="batch input"><br>
                    <label for="">*Batch </label>
                    <input type="text" class="input my-input" v-model="batch">
                    <small class="danger" v-if="batch_empty">Batch require*</small>
                  </div>
                </div>
              </div>
              <div class="footer">
                <div class="button-group">
                  <!-- ++++++++++++++++++++ button create User ++++++++++++++++++++ -->
                  <button class="orange" @click="checkValidationStudent">Create</button>
                  <!-- ++++++++++++++++++++ button concel create user +++++++++++++++++++ -->
                  <button class="blue" @click="clearnForm">Concell</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="left">
        <h1>NEW STUDENT ACCOUNT</h1>
        <br>
        <h4>To create new ADMIN account, please click on button below</h4>
        <div class="button">
          <button class="button-create-admin" @click="isCreateUser">Create Admin</button>
        </div>
      </div>
    </div>
  </div>

</template>
<script>

export default {
  data() {
    return {
      previewImage:null,
      name: "",
      email: "",
      password: '12345678',
      gender: "male",
      class_room: "",
      phone_number: "",
      picture: "user",
      batch: "",
      name_empty: false,
      class_empty: false,
      batch_empty: false,
      gender_empty:false,
      phone_number_empty: false,
      email_empty: false,
      password_empty: false,
      create_role:true
    };
  },
  methods: {
    /**
     * @todo Upload image
     * @return show image for preview 
     */
    uploadImage(e){
      this.picture=e.target.files[0]
      this.previewImage = URL.createObjectURL(this.picture);
    },
    /**
     * @todo change form for user create user
     * @return new form for create user
     */
    isCreateUser(){
      if(this.create_role){
        this.create_role = false
        this.clearnForm()
      }else{
        this.create_role = true
        this.clearnForm()
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
      //check gender
      if(this.gender.length ==0) {this.gender_empty=true}
      // check validation class
      if (this.class_room == '' ){ this.class_empty = true }
      // check validation batch
      if (this.batch == '' ){ this.batch_empty = true }
      // check for create user
      if (!this.name_empty && !this.email_empty && !this.phone_number_empty && !this.class_empty && !this.batch_empty) {
        this.createStudent()
      }
    },
    /**
     * @todo create new admin
     * @return new admin
     */
    createAdmin() {
        let newUser = new FormData();
        newUser.append("name", this.name);
        newUser.append("email", this.email);
        newUser.append("password", this.password);
        newUser.append("gender", this.gender);
        if(this.picture != 'user'){
          newUser.append("picture", this.picture);
        }
        this.clearnForm
        this.$emit("create-user", newUser, 'teacher');
    },
    /**
     * @todo create new student
     * @return new student
     */
    createStudent() {
      let newUser = new FormData();
      newUser.append("name", this.name);
      newUser.append("email", this.email);
      newUser.append("password", this.password);
      newUser.append("gender", this.gender);
      newUser.append("class_room", this.class_room);
      newUser.append("phone_number",this.phone_number);
      if(this.picture != 'user'){
        newUser.append("picture", this.picture);
      }
      newUser.append("bacth", this.batch);
      this.clearnForm
      this.$emit("create-user", newUser, 'student');
    },
    /**
     * @todo clean form create
     */
    clearnForm(){
      this.name = "";
      this.email = "";
      this.phone_number = "";
      this.class_room = "";
      this.batch = "",
      this.previewImage = null,
      this.picture="user"
    }
  },
};
</script>
<style scoped>


.danger{
  color: red;
}

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
  padding: 30px 0;
  margin-right: 40px;
}
.container .create-admin .left h1, h4{
  margin: 10px 0;
  line-height: 30px;
}
.container .create-admin .left .button{
  align-items: center;
  justify-content: center;
  display: flex;
  margin-top: -20px;
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
  cursor: pointer;
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
  padding: 30px 30px;
  margin-left: 100px;
}
.container .create-student .left h1, h4{
  margin: 10px 0;
  line-height: 26px;
}
.container .create-studen .left .button{
  align-items: center;
  justify-content: center;
  display: flex;
  margin-top: -60px;
}
.container .create-student .right{
  margin-left: 0px;
  width: 25%;
}
.container .create-student .right .form .card{
  width: 100%;
  padding: 30px;
  box-shadow: rgba(0, 0, 0, 0.395) 0px 1px 4px;
  border-radius: 5px;
}
.container .create-student .right .form .card .head {
  align-items: center;
  justify-content: center;
  display: flex;
}
.container .create-student .right .form .card .head img{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 1px solid rgb(177, 177, 177);
  cursor: pointer;
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
