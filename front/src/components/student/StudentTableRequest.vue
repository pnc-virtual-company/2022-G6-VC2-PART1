<template>
    <section>
        <div class="myoption">
        <h4>Leave type : </h4>
        <select class="leave_type" v-model="leave_type" >
          <option value="">All</option>
           <option value="sick">Sick</option>
           <option value="home">Home</option>
        </select>
        <h4>Status : </h4>
        <select class="status" v-model="status" >
          <option value="">All</option>
          <option value="cancel">Cancel</option>
          <option value="padding">Padding</option>
          <option value="approve">Aprove</option>
          <option value="reject">Reject</option>
        </select>
      </div>
    <table> 
        <tr> 
          <th>Request Date</th> 
          <th>Start Date</th> 
          <th>End Date</th> 
          <th>Duration</th> 
          <th>Reason</th> 
          <th>Status</th> 
          <th>Leave type</th> 
        </tr> 
        <tr v-for="leave of student_leave" :key="leave"> 
            <td>{{leave.created_at}}</td>
            <td>{{leave.start_date}}</td>
            <td>{{leave.end_date}}</td>
            <td>{{leave.duration}}</td>
            <td>{{leave.reason}}</td>
            <td :class="{'padding':leave.status=='padding'}" v-if="leave.status=='padding'">{{leave.status}}</td>
            <td :class="{'cancel':leave.status=='cancel'}" v-if="leave.status=='cancel'">{{leave.status}}</td>
            <td :class="{'approve':leave.status=='approve'}" v-if="leave.status=='approve'">{{leave.status}}</td>
            <td :class="{'reject':leave.status=='reject'}" v-if="leave.status=='reject'">{{leave.status}}</td>
            <td>{{leave.leave_type}}</td>
        </tr> 
      </table>
</section>
</template>
<script>
import axios from '@/api/api'
export default {
  data() {
    return {
      student_leave:[],
      leave_type:'',
      status:'',
    };
  },
  watch:{
  leave_type(){
    this.optionChange()
  },
  status(){
    this.optionChange()
  }
  },
  methods:{
    getUserLeave(){
      let userId = JSON.parse(localStorage.getItem('user')).id
      axios.get('leave/'+userId).then(res=>{
        this.student_leave = res.data
      })
    },
      /**
     * FUNCTION FOR STATUS OR LEAVE TYPE CHANGE
     */
    optionChange(){
      let userId = JSON.parse(localStorage.getItem('user')).id
      if(this.leave_type !=='' || this.status !==''){
        if (this.leave_type !== '' && this.status ===''){
            axios.get('leave/'+userId).then(res=>{
              this.student_leave = res.data.filter(leave=>leave.leave_type==this.leave_type)
            })
            
        }
        else if (this.status !== '' && this.leave_type ===''){
            axios.get('leave/'+userId).then(res=>{
              this.student_leave = res.data.filter(leave=>leave.status==this.status)
            })
        }
        else{
            axios.get('leave/'+userId).then(res=>{
              this.student_leave = res.data.filter(leave=>leave.status==this.status && leave.leave_type==this.leave_type)
            })
        }
      }
      else{
        this.getUserLeave()
      }
    }
  },
  mounted(){
    this.getUserLeave()
  }
}
</script>
<style scoped>
table { 
    margin:auto;
    font-family: arial, sans-serif; 
    border-collapse: collapse; 
    width: 80%; 

} 
td, th { 
    border: 1px solid #dddddd; 
    text-align: left; 
    padding: 15px; 
} 
th{
    background-color:  #6BD6F8;
}
tr:nth-child(even) { 
    background-color: #efecec; 
}
.search-bar{
    display:flex;
    width: 80%;
    margin: 10px auto;
    justify-content: end;
}
.button-42 {
  background-color: #FFAD5C;;
  background-image:  #FFAD5C;;
  border-radius: 6px;
  box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Inter,-apple-system,system-ui,Roboto,"Helvetica Neue",Arial,sans-serif;
  height: 40px;
  line-height: 40px;
  outline: 0;
  overflow: hidden;
  padding: 0 20px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  touch-action: manipulation;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: top;
  white-space: nowrap;
  z-index: 9;
  border: 0;
  transition: box-shadow .2s;
  margin-left: 10px;
}
.button-42:hover {
  box-shadow: rgba(211, 208, 207, 0.5) 0 3px 8px;
}
.padding{
  color: #FFAD5C;
}
.cancel{
  color: #6BD6F8;
}
.approve{
  color:#4d7eaf
}
.reject{
  color: red;
}
.myoption{
  display:flex;
  margin:auto;
  width:60%;
  justify-content:space-evenly;
  align-items: center;
  margin-top: 50px;
}
.leave_type,.status{
  margin-top: 15px;
}
</style>