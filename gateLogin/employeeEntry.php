<?php
require('../include/database.php');
require('../include/function.php');
if($_SESSION['userType']=="gate")
{
  $userEmail=$_SESSION['email'];
  $name=$_SESSION['name'];
  $picture=$_SESSION['image'];
  $getGateUserData=getGateUserDetails($db,$userEmail);
  date_default_timezone_set("Asia/Kolkata");
  $toDayDateIs=date("Y-m-d");
  $timeIs=date("h:i");
  echo $toDayDateIs;
  echo $timeIs;
}
else {
  header('location:../include/logout.php');
}

if(isset($_POST['find'])){
  $empId=mysqli_real_escape_string($db,$_POST['empId']);
  if ($empId) {
    $allEmployee=getEmployeeDetailsById($db,$empId);
    $empid=$allEmployee['empId'];
    $empName=$allEmployee['name'];
    $empDesc=$allEmployee['dept'];
    $inTime="";
    $outTime="";
    $image=$allEmployee['image'];
    

    $query="SELECT * FROM entryrigister WHERE empId='$empId' AND date='$toDayDateIs'";
    $runQuery=mysqli_query($db,$query);
    $totalRows=mysqli_num_rows($runQuery);
    if($totalRows >=1){
      $getAttendance=getEmployeeAttendance($db,$empId,$toDayDateIs);
      $attendanceId=$getAttendance['id'];
      $inTime=$getAttendance['inTime'];
      $outTime=$timeIs;
      if ($getAttendance['outTime'] !='') {
        $inTime=$timeIs;
        $outTime='';
        $attendanceId="";
      }
    }else {
      $inTime=$timeIs;
      $attendanceId="";
    }
  }

}else {
  $empid="";
  $empName="";
  $empDesc="";
  $inTime="";
  $outTime="";
  $image="images.png";
  $attendanceId="";
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyGate Cutm</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../cutm.png" rel="icon">
  <link href="../cutm.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="./report.php" class="logo d-flex align-items-center">
        <img src="../icon.webp" alt="">
        <span class="d-none d-lg-block">MyGate</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=$picture?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$name?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$name?></h6>
              <span>Gate User</span>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="../include/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="./report.php">
          <i class="ri-bar-chart-box-line"></i>
          <span>Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./register.php">
          <i class="bi bi-file-earmark"></i>
          <span>Register</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./allReport.php">
          <i class="bi bi-grid"></i>
          <span>All Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="./employeeEntry.php">
          <i class="bi bi-door-open"></i>
          <span>Employee Entry</span>
        </a>
      </li>


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./report.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Visitor List <?=$toDayDateIs?></h5>

              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Employee Id</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="empId" list="empId" value="" required>
                    <datalist id="empId">
                      <?php    
                        $getEmpId=getAllEmployeeId($db,$getGateUserData['campus']);
                        foreach($getEmpId as $getEmpIds){
                      ?>
                        <option value="<?=$getEmpIds['empId']?>"><?=$getEmpIds['empId']?></option>
                      <?php    
                        }
                      ?>
                    </datalist>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Find Employee</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="find">Find</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section dashboard">
      <div class="row">

       
        <div class="col-lg-12">
          <div class="row">


            
            <div class="col-lg-6">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Employee Details</h5>

                  <form action="./registerEntry.php" method="post">
                    <input type="hidden" name="attendanceId" value="<?=$attendanceId?>" >


                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">Employee Id</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="EntempId" value="<?=$empid?>" readonly >
                      </div>
                    </div> 
                    
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">Name of Employee</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="EntempName" value="<?=$empName?>" readonly >
                      </div>
                    </div> 

                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">Employee Designation</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="EntempName" value="<?=$empDesc?>" readonly >
                      </div>
                    </div> 

                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">Date</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" name="Enttoday" value="<?=$toDayDateIs?>" readonly >
                      </div>
                    </div> 

                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">In Time</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="EntInTime" value="<?=$inTime?>" readonly>
                      </div>
                    </div> 

                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">Out Time</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="EntOutTime" value="<?=$outTime?>" readonly>
                      </div>
                    </div> 

                    <div class="row mb-3">
                      <label class="col-sm-4 col-form-label">Submit Data</label>
                      <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary" name="registerEntry">Submit</button>
                      </div>
                    </div>


                  </form>
                </div>
              </div>
            </div>



            <div class="col-lg-6">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Employee Image</h5>
                  <img class="img-fluid" src="../userImage/<?=$image?>" alt="searching image" height="auto" width="100%">
                </div>
              </div>
            </div>

            
          </div>
        </div>

      </div>
    </section>

  </main>

  <?php
    include_once('../include/footer.php')
  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

  

</body>

</html>