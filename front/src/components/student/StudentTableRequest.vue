<template>
    <section>
    <table> 
        <div class="search-bar">
                <input type="text">
                <button class="button-42">search</button>
        </div>
        <tr> 
          <th>Request Date</th> 
          <th>Start Date</th> 
          <th>End Date</th> 
          <th>Duration</th> 
          <th>Direction</th> 
          <th>Reason</th> 
          <th>Status</th> 
        </tr> 
        <tr> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> 
        <tr> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> 
        <tr> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> 
        <tr> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> 
        <tr> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> 
      </table>
</section>
</template>

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
  /* width: 100%; */
  z-index: 9;
  border: 0;
  transition: box-shadow .2s;
  margin-left: 10px;
}
.button-42:hover {
  box-shadow: rgba(211, 208, 207, 0.5) 0 3px 8px;
}
</style>