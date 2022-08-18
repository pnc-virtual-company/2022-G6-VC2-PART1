<template>
    <div class="request">
        <div class="request-form">
            <div class="header">REQUEST LEAVE</div>
            <form action="" @submit.prevent>
                <div class="direction">
                    <label for="">Request Type</label>
                    <div>
                        <select name="" id="" v-model="leaveType">
                            <option value="sick">sick</option>
                            <option value="family">family</option>
                            <option value="dead">dead</option>
                        </select>
                    </div>
                </div>
                <div class="flex">
                    <div class="left">
                        <div class="date-leave">
                            <label for="">Date Leave</label>
                            <div><input type="date" v-model="leaveDate"></div>
                        </div>
                        <div class="date-arrive">
                            <label for="">Date Arrive</label>
                            <div><input type="date" v-model="arriveDate"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="time-leave">
                            <label for="">Time Leave</label>
                            <div>
                                <select name="" id="" v-model="timeLeave">
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>
                        <div class="time-arrive">
                            <label for="">Time Arrive</label>
                            <div>
                                <select name="" id="" v-model="arriveTime">
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="duration">
                    <strong>Duration</strong>: 
                        <br>
                        <br>
                </div>
                <div class="reason">
                    <label for="">Reason</label>
                    <div><textarea name="" id="" cols="30" rows="5" v-model="reason"></textarea></div>
                </div>
                <div class="button-group">
                    <button class="concell">CONCELL</button>
                    <button class="submit" @click="sendRequest">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>

</template>

<script>

export default{
    data() {
        return{
            leaveType:'',
            leaveDate:0,
            arriveDate:0,
            timeLeave:'',
            arriveTime:'',
            reason:'',
            duration:0
        }
    },
    methods:{
        sendRequest(){
            console.log((this.arriveDate).diff((this.leaveDate), "days"));
            // this.$emit('data-request', {leaveType:this.leaveType, leaveDate:this.leaveDate, arriveDate:this.arriveDate, timeLeave:this.timeLeave, arriveTime:this.arriveTime, reason:this.reason})
        }
    },
    computed:{
        // durationTime(){
            
        // }
    }
}
</script>

