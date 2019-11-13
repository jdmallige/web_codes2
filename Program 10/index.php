
<!DOCTYPE html>
<html>
<head>
    <title>Selection Sort</title>
</head>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
var globalData=null;
var tempData;
if(tempData===null||tempData===undefined){
   tempData={};
}

tempData={
    saveRecord:function(){
        var url="ajaxInfo.php";
        var formEQData = new FormData($('#formRecord')[0]);
        formEQData.append("saveRecord","saveRecord");

        $.ajax({
          type:"POST",
          url:url,
          async: false,
          dataType: 'json',
          cache : false,
          processData: false,          
          contentType: false,
          data:formEQData,
          success: function(obj) {
              alert(obj.msg);
              tempData.getRecord(); // Calling function to fetch the Record from DB.
          }
        });
    },
    getRecord:function(){
        var url="ajaxInfo.php";
        var myData = {getRecord:'getRecord'};

       $.ajax({
          type:"POST",
          url:url,
          async: false,
          dataType: 'json',
          data:myData,
          success: function(obj) {
            globalData=obj.studentArr;  // Assigning to Global Variable 
            
            var content="";
             $('#tableRow').html("");
            for(var i = 0; i<obj.studentArr.length; i++) {
                content+='<tr><td>'+obj.studentArr[i].stu_id+'</td><td>'+obj.studentArr[i].stu_name+'</td>'
                          +'<td>'+obj.studentArr[i].stu_mobile+'</td><td>'+obj.studentArr[i].stu_email+'</td></tr>';      
            }
             $('#tableRow').append(content);
          }
        });
    },
    selectionSort:function(){
        var url="ajaxInfo.php";
        var myData = {selectionSort:'selectionSort'};

       $.ajax({
          type:"POST",
          url:url,
          async: false,
          dataType: 'json',
          data:myData,
          success: function(obj) {
            var content="";
             $('#tableRow').html("");

            for(var i = 0; i<obj.sortedArr.length; i++) {
                for(var j = 0; j<globalData.length; j++) {
                    if(obj.sortedArr[i]==globalData[j].stu_id){
                    content+='<tr><td>'+globalData[j].stu_id+'</td><td>'+globalData[j].stu_name+'</td>'
                              +'<td>'+globalData[j].stu_mobile+'</td><td>'+globalData[j].stu_email+'</td></tr>';
                    }
                      
                }   
            }
             $('#tableRow').append(content);
          }
        });
    },

};

$(document).ready(function() {
    tempData.getRecord();
});    
</script>
<body>

    <center>
        <h1> Add Student Record </h1>
        <form id="formRecord">
            <table border="0">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td><input type="number" name="mobile" id="mobile"></td>
                </tr>
                <tr>
                    <td>Email ID</td>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
            </table><br>

              <button type="button" onclick="tempData.saveRecord();" style="width:150px;">Add Student</button>
              
        </form>
<br/><br/>

<div style="overflow-x: scroll;height: 600px;width:60%;">

<button type="button" style="width:150px;float: right;" onclick="tempData.selectionSort();" >
Selection Sort</button>

<br/><br/>
<table border=1 style="width:100%;">
  <thead>
    <tr style="text-align: left;">
      <th>Student ID</th>
      <th>Name</th>
      <th>Mobile</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody id="tableRow">
  </tbody>
</table>
</div>
    </center>

</body>
</html>