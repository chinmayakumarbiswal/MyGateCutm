<?php
require('../include/database.php');
require('../include/function.php');
if($_SESSION['userType']=="superAdmin")
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

if(isset($_POST['find'])){
  $visitingNo=mysqli_real_escape_string($db,$_POST['visitingNo']);
  $nameOfVisit=mysqli_real_escape_string($db,$_POST['nameOfVisit']);

  if ($visitingNo) {
    echo $visitingNo;
    $getDataForTable=getAllVisitorInGateWithVigitNo($db,$getAdminUserData['campus'],$visitingNo);  
  }else if ($nameOfVisit) {
    $getDataForTable=getAllVisitorInGateWithVigitName($db,$getAdminUserData['campus'],$nameOfVisit);
  }else{
    $getDataForTable=getAllDataildInGateWirhCampus($db,$getAdminUserData['campus']);   
  }
}else{
  $getDataForTable=getAllDataildInGateWirhCampus($db,$getAdminUserData['campus']);   
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
        <a class="nav-link " href="./admin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./report.php">
          <i class="ri-bar-chart-box-line"></i>
          <span>Report</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./addAdmin.php">
          <i class="bx bx-message-square-add"></i>
          <span>Add Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./addUser.php">
            <i class="ri ri-user-add-line"></i>
            <span>Add User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="./addEmployee.php">
            <i class="ri ri-user-add-line"></i>
            <span>Add Employee</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="./addGate.php">
            <i class="bx bxs-door-open"></i>
            <span>Add Gate User</span>
        </a>
      </li>


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
              <h5 class="card-title">All Visitor List</h5>

              <!-- General Form Elements -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Visiting Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="visitingNo" list="visitingNoList" value="">
                    <datalist id="visitingNoList">
                      <?php    
                        $getVisitorId=getAllVisitorIds($db,$getAdminUserData['campus']);
                        foreach($getVisitorId as $getVisitorIds){
                      ?>
                        <option value="<?=$getVisitorIds['visitingID']?>"><?=$getVisitorIds['visitingID']?></option>
                      <?php    
                        }
                      ?>
                    </datalist>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name of Visitor</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nameOfVisit" list="visitingNameList" value="">
                    <datalist id="visitingNameList">
                      <?php    
                        $getVisitorName=getAllVisitorNames($db,$getAdminUserData['campus']);
                        foreach($getVisitorName as $getVisitorNames){
                      ?>
                        <option value="<?=$getVisitorNames['nameOfVisit']?>"><?=$getVisitorNames['nameOfVisit']?></option>
                      <?php    
                        }
                      ?>
                    </datalist>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Search List</label>
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

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Applied Student</h5>

                  <table class="table table-borderless datatable">
                  <thead>
                      <tr>
                      <th scope="col">Visiting ID</th>
                        <th scope="col">Name Of Visitor</th>
                        <th scope="col">Comming From</th>
                        <th scope="col">Date of Visiting</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Vehicle Number</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Meeting Name</th>
                        <th scope="col">Register By</th>
                        <th scope="col">Image</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php     
                        foreach($getDataForTable as $getDataForTables){
                      ?>
                      <tr>
                        <td><?=$getDataForTables['visitingID']?></td>
                        <td><?=$getDataForTables['nameOfVisit']?></td>
                        <td><?=$getDataForTables['org']?></td>
                        <td><?=$getDataForTables['date']?></td>
                        <td><?=$getDataForTables['no']?></td>
                        <td><?=$getDataForTables['vehicleno']?></td>
                        <td><?=$getDataForTables['purpose']?></td>
                        <td><?=$getDataForTables['meetingName']?></td>
                        <td><?=$getDataForTables['registerEmail']?></td>
                        <td><img class="img-fluid" src="../userImage/<?=$getDataForTables['photos']?>" alt="" height="50px" width="50px"></td>
                        
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
    

</body>

</html>