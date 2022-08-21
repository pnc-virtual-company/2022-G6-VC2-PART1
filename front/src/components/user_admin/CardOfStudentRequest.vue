<template>
  <div class="card" v-for="student of student_leave" :key="student">
    <div class="card_title">
      <h2>{{student.students.name}}</h2>
    </div>
    <div class="card_body">
      <div class="row">
        <p>{{student.students.class_room}}</p>
        <div class="col">
          <p><strong>type : </strong> {{student.leave_type}}</p>
        </div>
      </div>
      <div class="row">
        <div>
          <p><strong>Duration : </strong> {{student.duration}} day</p>
        </div>
        <div class="col">
          <p><strong>reason : </strong> {{student.reason}}</p>
        </div>
      </div>
      <div class="row">
        <div>
          <p><strong>Start : </strong> {{student.start_date}}</p>
        </div>
        <div class="col">
          <p><strong>End : </strong> {{student.end_date}}</p>
        </div>
      </div>
    </div>
    <div class="card_footer">
      <button class="btn-orange">reject</button>
      <button class="btn-blue">approve</button>
    </div>
  </div>
</template>

<script>
import axios from "../../axios-http";
const URL_studentLeave = process.env.VUE_APP_API_URL + "leave";
export default {
  data() {
    return {
      student_leave:[]
    };
  },
    // FUNCTION students leave///
    methods: {
      getStudentLeave() {
        axios.get(URL_studentLeave).then(response=>{
            this.student_leave = response.data;
        })
      }
    },
    mounted(){
        this.getStudentLeave();
    }
  }
</script>

<style scoped>
body {
  background: rgb(229, 229, 229);
}
.card {
  width: 50%;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  padding: 5px;
  border-radius: 5px;
  margin: 20px auto;
  border-top: 5px solid #55b4f4;
}
.card_title {
  margin: auto;
  width: 80%;
}
.row {
  padding: 10px;
  margin: auto;
  width: 80%;
  display: flex;
  justify-content: space-between;
}

.card_footer {
  margin: auto;
  width: 80%;
  display: flex;
  justify-content: end;
  /* padding: 5px; */
}
.btn-blue,
.btn-orange {
  border: none;
  padding: 0.5rem;
  margin-right: 5px;
  width: 20%;
  border-radius: 5px;
}
.btn-orange {
  background: #ffad5c;
}
.btn-blue {
  background: #07b7dd;
}
.card_title {
  text-align: left;
}
.col {
  width: 50%;
  text-align: left;
}
</style>
