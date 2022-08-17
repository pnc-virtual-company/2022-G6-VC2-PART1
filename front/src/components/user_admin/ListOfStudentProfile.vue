<template>
    <div>
        <div class="search-bar">
            <input type="text" placeholder="search" class="search">
            <button class="btn-orange">Search</button>
        </div>
        <div class="card">
            <div class="card-title">
                <div class="circle">SLMS</div>
                <div>
                    <h1>vichet morm</h1>
                    <label>web-2022-A</label>
                </div>
            </div>
            <div>
                <button class="btn-orange">read more</button>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <div class="circle">SLMS</div>
                <div>
                    <h1>vichet morm</h1>
                    <label>web-2022-A</label>
                </div>
            </div>
            <div>
                <button class="btn-orange">read more</button>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <div class="circle">SLMS</div>
                <div>
                    <h1>vichet morm</h1>
                    <label>web-2022-A</label>
                </div>
            </div>
            <div>
                <button class="btn-orange">read more</button>
            </div>
        </div>
    </div>
</template>


<style scoped>
*{
    outline: none;
    border: none;
}
.search-bar{
    display: flex;
    justify-content: center;
    align-items: center;
    
    /* background: #000; */
    padding: 5px;
}
.search{
    padding: 7px;
    margin-right: 10px;
    border-radius: 10px;
    background: rgb(216, 216, 216);
    width: 20%;
}
.card{
    width: 50%;
    margin:15px auto;
    padding: 5px;
    background: rgb(230, 230, 230);
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 5px;
    box-shadow: rgb(109, 108, 108) 0 2px 8px;
}
.card-title{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 40%;

}
.circle{
    padding: 10px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #000;
    margin-right: 4px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: wheat;
    font-size: 20px;
}
.btn-orange{
    padding: 0.5rem;
    border-radius: 5px;
    background: orange;
}
</style>