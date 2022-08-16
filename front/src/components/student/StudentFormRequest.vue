<template>
    <div class="request">
        <div class="request-form">
            <div class="header">REQUEST LEAVE</div>
            <form action="">
                <div class="flex">
                    <div class="left">
                        <div class="date-leave">
                            <label for="">Date Leave</label>
                            <div><input type="date"></div>
                        </div>
                        <div class="date-arrive">
                            <label for="">Date Arrive</label>
                            <div><input type="date"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="time-leave">
                            <label for="">Time Leave</label>
                            <div>
                                <select name="" id="">
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>
                        <div class="time-arrive">
                            <label for="">Time Arrive</label>
                            <div>
                                <select name="" id="">
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="direction">
                    <label for="">Direction Place</label>
                    <div><textarea name="" id="" cols="30" rows="5"></textarea></div>
                </div>
                <div class="reason">
                    <label for="">Reason</label>
                    <div><textarea name="" id="" cols="30" rows="5"></textarea></div>
                </div>
                <div class="button-group">
                    <button class="concell">CONCELL</button>
                    <button class="submit">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>

</template>
