<template>
    <div class="request">
        <div class="request-form">
            <div class="header">REQUEST LEAVE</div>
            <form action="">
                <div class="leave-type">
                    <label for="">Leave Type</label>
                    <div>
                        <select v-model="leave_type">
                            <option value="sick">Sick</option>
                            <option value="home">Home</option>
                        </select>    
                    </div>
                </div>
                <div class="flex">
                    <div class="left">
                        <div class="date-leave">
                            <label for="">Date Leave</label>
                            <div><input type="date" v-model="start_date" @change="checkDuration" :min="disableCalendar" required></div>
                        </div>
                        <div class="date-arrive">
                            <label for="">Date Arrive</label>
                            <div><input type="date" v-model="end_date" @change="checkDuration" :min="start_date" required></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="time-leave">
                            <label for="">Time Leave</label>
                            <div>
                                <select name="" id="" v-model="time_leave" @change="checkDuration" required>
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>
                        <div class="time-arrive">
                            <label for="">Time Arrive</label>
                            <div>
                                <select name="" id="" v-model="time_arrive" @change="checkDuration" required>
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="duration">
                    Duration : {{duration}} day
                </div>
                

                <div class="reason">
                    <label for="">Reason</label>
                    <div><textarea name="" id="" cols="30" rows="5" v-model="reason"></textarea></div>
                </div>
                <div class="button-group">
                    <button class="concell">CONCELL</button>
                    <button class="submit" @click.prevent="addReques">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>

</template>
<script>
import axios from '@/api/api'
export default {
    data(){
        return{
            start_date:new Date(),
            end_date:new Date(),
            time_leave:'',
            time_arrive:'',
            duration:0,
            reason:'',
            leave_type:'',
            disableCalendar:''
        }
    },
    methods:{
        /**
         * CONVERT DATE FORMART
         * @param {*} date 
         * 
         */
        convertDate(date){
            let newDate = new Date(date);
            let day = newDate.getDate();
            if (day<10){
                day = '0'+day;
            }
            let month= newDate.getMonth()+1;
            if (month<10){
                month = '0'+month;
            }
            let year= newDate.getFullYear();
            let currentDate=year+'-'+month+'-'+day
            return currentDate
        },

        /**
         * CHECK DURATION DAY
         */
        checkDuration(){
            if (this.convertDate(this.start_date) !== this.convertDate(new Date()) || this.convertDate(this.end_date) !== this.convertDate(new Date())){
                let start= new Date(this.start_date);
                let end = new Date(this.end_date);
                this.duration=parseInt((end-start)/(1000*60*60*24))
            }
            else{
                this.duration=0
            }
            /**
             * CHECK DALY TIME (morning or afternoon)
             */
            if ((this.time_leave==this.time_arrive)&& (this.time_arrive!=''&& this.time_leave!='')){
                this.duration+=0.5
            }else if((this.time_leave!=this.time_arrive)&& (this.time_arrive!=''&& this.time_leave!='')){
                this.duration+=1
            }
        },
        addReques(){
            let student_id = JSON.parse(localStorage.getItem('user'))
            let newReques={ student_id:student_id.id,
                            start_date:this.start_date,
                            end_date:this.end_date,
                            duration:this.duration,
                            reason:this.reason,
                            leave_type:this.leave_type,
                            status:'padding'
                          }
            axios.post('leave/',newReques)
            this.time_leave = '';
            this.time_arrive = '';
            this.duration = '';
            this.reason = '';
            this.start_date = new Date();
            this.end_date = new Date();
        }
    },
    mounted(){
        /**
         * disamble calender previouse date
         */
        this.disableCalendar=this.convertDate(new Date())
    }
}
</script>
