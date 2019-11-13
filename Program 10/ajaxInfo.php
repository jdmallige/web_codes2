<?php

/* Fetching the initial data */
/*$Query = 'select * from info';
$fetchRec = mysqli_query($con,$Query) or die(mysqli_error());*/


/* Add the record to DATABASE */

error_reporting(0);
session_start(); 

$con = mysqli_connect("localhost","vishal","vishal","student_db");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['saveRecord']))
{
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    
    if($name !='' && $mobile !='' && $email !='')
    {       
        $stu_id = rand(0,99999); //random number generation

        $Query ="insert into info(stu_id,stu_name,stu_mobile,stu_email) 
        values($stu_id,'$name',$mobile,'$email')";  
        mysqli_query($con,$Query) or die(mysqli_error());     
        $msg = 'Record Saved Successfully  !';
    }
    else{
         $msg = "Text Field is empty !";
    }

    $status['msg'] = $msg;     
    echo json_encode($status);
    mysqli_close($con);
}

/* read all studrnt data from DATABASE */
if(isset($_POST['getRecord']))
{
    $sql = "select * from info";
    $fetchRec = mysqli_query($con,$sql) or die(mysqli_error());
    while ($row=mysqli_fetch_array($fetchRec)) 
    { 
        $stu_id = $row['stu_id'];                                            
        $stu_name = $row['stu_name']; 
        $stu_mobile = $row['stu_mobile']; 
        $stu_email = $row['stu_email']; 

        $studentArr[]=array('stu_id' =>$stu_id,
                            'stu_name' =>$stu_name,
                            'stu_mobile' =>$stu_mobile,
                            'stu_email' =>$stu_email
                            );
    }

    $status['studentArr'] = $studentArr;     
    echo json_encode($status);
    mysqli_close($con);

}

/* read data from DATABASE */
if(isset($_POST['selectionSort']))
{
    $sql = "select * from info";
    $fetchRec = mysqli_query($con,$sql) or die(mysqli_error());
    while ($row=mysqli_fetch_array($fetchRec)) { 
        $getStuID[]= $row['stu_id'];   
    }

    $selectionArr = selection_sort($getStuID);  // calling selection Sort function

    $status['sortedArr'] = $selectionArr;     
    echo json_encode($status);
    mysqli_close($con);

}

function selection_sort($data)
{
    for($i=0; $i<count($data)-1; $i++) {
        $min = $i;
        for($j=$i+1; $j<count($data); $j++) {
            if ($data[$j]<$data[$min]) {
                $min = $j;
            }
        }
        $data = swap_positions($data, $i, $min);
    }
    return $data;
}

function swap_positions($data1, $left, $right) {
    $backup_old_data_right_value = $data1[$right];
    $data1[$right] = $data1[$left];
    $data1[$left] = $backup_old_data_right_value;
    return $data1;
}
?>