<?php
require('../include/database.php');
require('../include/function.php');

date_default_timezone_set("Asia/Kolkata");
$toDayDateIs=date("Y-m-d");

if($_SESSION['userType']=="admin")
{
  $userEmail=$_SESSION['email'];
  $name=$_SESSION['name'];
  $picture=$_SESSION['image'];
  $getAdminUserData=getAdminDetails($db,$userEmail);
  echo $getAdminUserData['campus'];
  
}
else {
  header('location:../include/logout.php');
}

if($userEmail=="chinmayakumarbiswal45@gmail.com"){
  $uploadImgSideBar='<li class="nav-item">
                          <a class="nav-link" href="./updateProfile.php">
                              <i class="bi bi-card-image"></i>
                              <span>Update Image</span>
                          </a>
                      </li>';
}else {
  $uploadImgSideBar='';
}


if(isset($_POST['findEnt'])){
  $fromDate=mysqli_real_escape_string($db,$_POST['fromDate']);
  $ToDate=mysqli_real_escape_string($db,$_POST['ToDate']);
  if ($fromDate > $ToDate) {
    echo "<script>alert('Select a valid date');</script>";
    $headerContent="of ".$toDayDateIs;
    $employeeEntryData=getAllEmployeeEntry($db,$toDayDateIs);
  }else {
    $headerContent="from ".$fromDate." to ".$ToDate;
    $employeeEntryData=getEmployeeEntryFromTo($db,$fromDate,$ToDate);
  }
}else {
  $headerContent="of ".$toDayDateIs;
  $employeeEntryData=getAllEmployeeEntry($db,$toDayDateIs);
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
      <a href="./admin.php" class="logo d-flex align-items-center">
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
              <span>Admin</span>
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
        <a class="nav-link collapsed" href="./admin.php">
          <i class="ri-bar-chart-box-line"></i>
          <span>Report</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./allReport.php">
          <i class="bi bi-grid"></i>
          <span>All Report</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="./gateEntryReport.php">
          <i class="bi bi-door-open"></i>
          <span>All Entry Report</span>
        </a>
      </li>

      <?=$uploadImgSideBar?>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./admin.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Find Entry Details</h5>

              <!-- General Form Elements -->
              <form action="" method="post" >
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">From Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="fromDate" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">To Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="ToDate" required>
                  </div>
                </div>
                
                
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Find Entry</label>
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary" name="findEnt">Find</button>
                  </div>

                  <label class="col-sm-3 col-form-label">Print Entry Data Data</label>
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-primary" onclick="printTable()">Print To Excel</button>
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

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Total Data <?=$headerContent?></h5>

                  <table class="table table-borderless datatable" id="tableData">
                    <thead>
                      <tr>
                        <th scope="col">Employee Id</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Employee Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">In Time</th>
                        <th scope="col">Out Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php     
                        foreach($employeeEntryData as $employeeEntryDatas){
                          $getEmpFullData=getEmployeeDetailsById($db,$employeeEntryDatas['empId']);
                      ?>
                      <tr>
                        <td><?=$employeeEntryDatas['empId']?></td>
                        <td><?=$getEmpFullData['name']?></td>
                        <td><?=$getEmpFullData['email']?></td>
                        <td><?=$employeeEntryDatas['date']?></td>
                        <td><?=$employeeEntryDatas['inTime']?></td>
                        <td><?=$employeeEntryDatas['outTime']?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js" integrity="sha512-r22gChDnGvBylk90+2e/ycr3RVrDi8DIOkIGNhJlKfuyQM4tIRAI062MaV8sfjQKYVGjOBaZBOA87z+IhZE9DA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
  <script>
    function printTable() {
      let data = document.getElementById('tableData');
      var fp = XLSX.utils.table_to_book(data, {sheet: 'cutm'});
      XLSX.write(fp, {
          bookType: 'xlsx',
          type: 'base64'
      });
      XLSX.writeFile(fp, 'entryData.xlsx')
    }
    
  </script>
 

</body>

</html>