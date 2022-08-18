<template>
   <div class="card">
        <div class="card_title">
            <h2>Vichet Morm</h2>
        </div>
        <div class="card_body">
            <div class="row">
                <p>web-2022-A</p>
                <div class="col">
                    <p><strong>type : </strong> familay's even</p>
                </div>
            </div>
            <div class="row">
                <div>
                    <p><strong>Duration : </strong> 1 day</p>
                </div>
                <div class="col">
                    <p><strong>reason : </strong> Go to eat dinner with family</p>
                </div>
            </div>
            <div class="row">
                <div>
                    <p><strong>Start : </strong> 30-09-2022</p>
                </div>
                <div class="col">
                    <p><strong>Snd : </strong> 30-09-2022</p>
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
export default {

}
</script>

<style scoped>
        body{
            background: rgb(229, 229, 229);
        }
        .card{
            width: 50%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 5px;
            border-radius:5px;
            margin: 20px auto;
            border-top: 5px solid #55B4F4;
        }
        .card_title{
            margin: auto;
            width: 80%;
        }
        .row{
            padding: 10px;
            margin:  auto;
            width: 80%;
            display: flex;
            justify-content: space-between;
        }

        .card_footer{
            margin: auto;
            width: 80%;
            display: flex;
            justify-content: end;
            /* padding: 5px; */
        }
        .btn-blue,.btn-orange{
            border: none;
            padding: 0.5rem;
            margin-right: 5px;
            width: 20%;
            border-radius: 5px;
        }
        .btn-orange{  
            background: #FFAD5C;
        }
        .btn-blue{
            background: #07B7DD;
        }
        .card_title{
            text-align: left;
        }
        .col{
            width:50%;
            text-align: left;
        }
</style>