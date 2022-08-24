<template>
  <div class="status">
    <div class="status-card">
      <div class="card-padding card"><h2>Padding</h2><h3>{{statusPadding}}</h3></div>
      <div class="card-reject card"><h2>Reject</h2><h3>{{statusReject}}</h3></div>
      <div class="card-approve card"><h2>Approve</h2><h3>{{statusApprove}}</h3></div>
    </div>
  </div>
  <div v-for="student of student_leave" :key="student">
    <div class="card" v-if="student.status == 'padding'">
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
        <button class="btn-orange" @click="changeStatus(student, 'reject')">reject</button>
        <button class="btn-blue" @click="changeStatus(student, 'approve')">approve</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "../../axios-http";
const URL_studentLeave = process.env.VUE_APP_API_URL + "leave/";
export default {
  data() {
    return {
      student_leave:[],
      statusPadding:0,
      statusReject:0,
      statusApprove:0
    };
  },
    // FUNCTION students leave///
    methods: {
      getStudentLeave() {
        axios.get(URL_studentLeave).then(response=>{
            this.student_leave = response.data;
        })
        this.getNumberOfStatus();
      },
      /**
       * admit update status for student request
       * return new status
       */
      changeStatus(leaveData, status) {
        leaveData.status = status
        axios.put(URL_studentLeave+leaveData.id, leaveData)
        this.getNumberOfStatus()
      },
      /**
       * count number of each status
       */
      getNumberOfStatus() {
        axios.get(URL_studentLeave+'status/padding').then(response=>{
            this.statusPadding = response.data.length;
        })
        axios.get(URL_studentLeave+'status/reject').then(response=>{
            this.statusReject = response.data.length;
        })
        axios.get(URL_studentLeave+'status/approve').then(response=>{
            this.statusApprove = response.data.length;
        })
      },

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
.status{
  /* background: #ffad5c; */
  align-items: center;
  justify-content: center;
  display: flex;
  margin-top: 40px;
  /* background: #55b4f4; */
}
.status .status-card{
  width: 50%;
  align-items: center;
  justify-content: space-between; 
  display: flex;
  gap: 20px;
}
.status .status-card .card{
  background: white;
  text-align: center;
}
.status .status-card .card h3{
  padding: 20px 0;
}
.status .status-card .card button{
  padding: 7px 25px;
  border: none;
  margin-bottom: 10px;
  background: #ffad5c;
  border-radius: 4px;
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
  cursor: pointer;
}
.btn-blue {
  background: #07b7dd;
  cursor: pointer;
}
.card_title {
  text-align: left;
}
.col {
  width: 50%;
  text-align: left;
}
</style>
