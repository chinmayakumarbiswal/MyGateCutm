<?php
    function randPass() {
        $chars = "0123456789";
        return substr(str_shuffle($chars),0,6);
    }

    function getAllDetaild($db,$email){
        $query="SELECT * FROM visitordata WHERE registerEmail='$email' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getUserDetails($db,$email){
        $query="SELECT * FROM studentdata WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getEmployeeDetails($db,$email){
        $query="SELECT * FROM employee WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getGateUserDetails($db,$email){
        $query="SELECT * FROM gate WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllDetaildInGate($db,$campusIs,$DateIs){
        $query="SELECT * FROM visitordata WHERE campus='$campusIs' AND date='$DateIs' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllDetaildInGateWithVigitNo($db,$campusIs,$DateIs,$visitingNo){
        $query="SELECT * FROM visitordata WHERE campus='$campusIs' AND date='$DateIs' AND visitingID='$visitingNo' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllDetaildInGateWithName($db,$campusIs,$DateIs,$nameOfVisit){
        $query="SELECT * FROM visitordata WHERE campus='$campusIs' AND date='$DateIs' AND nameOfVisit='$nameOfVisit' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllDataildInGateWirhCampus($db,$campusIs){
        $query="SELECT * FROM visitordata WHERE campus='$campusIs' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllVisitorId($db,$DateIs,$campusIs){
        $query="SELECT * FROM visitordata WHERE date='$DateIs' AND campus='$campusIs' GROUP BY visitingID";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
   

    function getAllVisitorName($db,$DateIs,$campusIs){
        $query="SELECT * FROM visitordata WHERE date='$DateIs' AND campus='$campusIs' GROUP BY nameOfVisit";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getVerifyData($db,$registerId,$visitingId){
        $query="SELECT * FROM visitordata WHERE id='$registerId' AND visitingID='$visitingId'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }
    

    function getAllVisitorInGateWithVigitNo($db,$campusIs,$visitingNo){
        $query="SELECT * FROM visitordata WHERE campus='$campusIs' AND visitingID='$visitingNo' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllVisitorInGateWithVigitName($db,$campusIs,$nameOfVisit){
        $query="SELECT * FROM visitordata WHERE campus='$campusIs' AND nameOfVisit='$nameOfVisit' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllDataildInGate($db,$gateIs){
        $query="SELECT * FROM visitordata WHERE gate='$gateIs' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllVisitorIds($db,$campusIs){
        $query="SELECT * FROM visitordata WHERE campus='$campusIs' GROUP BY visitingID";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
   

    function getAllVisitorNames($db,$campusIs){
        $query="SELECT * FROM visitordata WHERE campus='$campusIs' GROUP BY nameOfVisit";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAdminDetails($db,$email){
        $query="SELECT * FROM admindata WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllAdminDetailsByAdmin($db){
        $query="SELECT * FROM admindata";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllCampus($db){
        $query="SELECT * FROM campus";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllUserByAdminForList($db){
        $query="SELECT * FROM studentdata ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
    function getAllGateDetailsByAdmin($db){
        $query="SELECT * FROM gate ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllEmployeeId($db,$campusIs){
        $query="SELECT * FROM employee WHERE campus='$campusIs' GROUP BY empId";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getEmployeeDetailsById($db,$empId){
        $query="SELECT * FROM employee WHERE empId='$empId'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getEmployeeAttendance($db,$empIdEntry,$toDayDateIs){
        $query="SELECT * FROM entryrigister WHERE empId='$empIdEntry' AND date='$toDayDateIs' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllEmployeeByAdminForList($db){
        $query="SELECT * FROM employee ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllEmployeeAndStudentId($db,$campusIs){
        $query="SELECT name, email,dept FROM employee UNION ALL SELECT name, email,dept FROM studentdata WHERE campus='$campusIs'";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }


    function getAllCampusEmployeeId($db){
        $query="SELECT * FROM employee GROUP BY empId";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getEmployeeEntryByEmp($db,$fromDate,$ToDate,$empId){
        $query="SELECT * FROM entryrigister WHERE empId ='$empId' AND date BETWEEN '$fromDate' AND '$ToDate' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getEmployeeEntryByEmpOnlyToDay($db,$toDayDateIs,$empId){
        $query="SELECT * FROM entryrigister WHERE empId ='$empId' AND date='$toDayDateIs' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
?>