<?php
require('../include/database.php');
require('../include/function.php');
require('../mailer.php');

if(isset($_POST['registerEntry'])){
    $attendanceId=mysqli_real_escape_string($db,$_POST['attendanceId']);
    $empIdEntry=mysqli_real_escape_string($db,$_POST['EntempId']);
    $date=mysqli_real_escape_string($db,$_POST['Enttoday']);
    $enterTime=mysqli_real_escape_string($db,$_POST['EntInTime']);
    $outTime=mysqli_real_escape_string($db,$_POST['EntOutTime']);

    echo $attendanceId;
    echo $empIdEntry;
    echo $date;
    echo $enterTime;
    echo $outTime;

    $allEmployee=getEmployeeDetailsById($db,$empIdEntry);
    $getEName=$allEmployee['name'];
    $getEemail=$allEmployee['email'];

    if ($attendanceId == '') {
        $query="INSERT INTO entryrigister (empId,date,inTime,outTime) VALUES('$empIdEntry','$date','$enterTime','$outTime')";
        $run=mysqli_query($db,$query) or die(mysqli_error($db));
        
        if ($run) {
            $msg="Hello ".$getEName." Welcome to CUTM. You Entered to Campus on ".$date." at ".$enterTime;
            $isMailSend=smtp_mailer($getEemail,'Welcome to Cutm',$msg);
            echo "<script>alert('Welcome to Cutm');window.location.href = './employeeEntry.php';</script>";
        }
    }else {
        $query="UPDATE entryrigister SET `outTime`='$outTime' WHERE id='$attendanceId'";
        $run=mysqli_query($db,$query) or die(mysqli_error($db));
        
        if ($run) {
            $msg="Hello ".$getEName." Thank You for Visiting CUTM. You Entered to Campus on ".$date." at ".$enterTime." and leave the campus at ".$outTime;
            $isMailSend=smtp_mailer($getEemail,'Thank You for Visiting CUTM',$msg);
            echo "<script>alert('Thank You Bye');window.location.href = './employeeEntry.php';</script>";
        }
    }
  
    $query="SELECT * FROM entryrigister WHERE empId='$empIdEntry' AND date='$date'";
    $runQuery=mysqli_query($db,$query);
    $totalRows=mysqli_num_rows($runQuery);
    if($totalRows >=1){

    }else {
    
      
    }
}
?>