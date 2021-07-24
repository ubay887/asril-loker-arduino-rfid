<?php

//memulai session yang disimpan pada browser

require_once "waktusesi.php";

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:index.php");
}

require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>

<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="refresh" content="10"> 
    
    <title>Status Loker</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <link rel="stylesheet" href="css.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>

    <script src=”jquery-latest.js”></script>
    


    


  </head>
  <body class="h-100" showdata>
  <!-- <p class="text-right">
  <a href="logout.php">
             <button name="download" type="submit" class="btn btn-danger">Keluar</button>
             </a> 
             </p> -->
             

        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shield.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Penyimpanan Loker </span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
        
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="beranda.php">
                  <i class="material-icons">edit</i>
                  <span>Status Loker</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="tables.php">
                  <i class="material-icons">table_chart</i>
                  <span>Riwayat Penggunaan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="pendaftaran.php">
                  <i class="material-icons">person</i>
                  <span>Data Pengguna</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link " href="errors.php">
                  <i class="material-icons">error</i>
                  <span>Errors</span>
                </a>
              </li> -->
            </ul>
         

             
          </div>
          
        </aside>
        
        <!-- End Main Sidebar -->
        
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            
          <!-- / .main-navbar -->
          <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <!-- <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div> -->
              </form>
              <ul class="navbar-nav border-left flex-row ">
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/avatars/2.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block"> <?php echo $_SESSION['nama']; ?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <!-- <a class="dropdown-item" href="user-profile-lite.html">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <a class="dropdown-item" href="components-blog-posts.html">
                      <i class="material-icons">vertical_split</i> Blog Posts</a>
                    <a class="dropdown-item" href="add-new-post.html">
                      <i class="material-icons">note_add</i> Add New Post</a>
                    <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item text-danger" href="logout.php">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Status Loker</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
            <div class="row">
              
                          
                          <?php
                          //   $sql = mysqli_query($koneksi, "SELECT `status` FROM loker WHERE loker =  1");
                            $sql = mysqli_query($koneksi, "SELECT `status`,`waktu` FROM datakartu WHERE loker =  1 ORDER BY id DESC LIMIT 1");
              
                              if(mysqli_num_rows($sql) == 0){ 
                             //   echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
                             echo'
                             <div class="col-lg col-md-4 col-sm-6 mb-4">
                               <div class="stats-small stats-small--1 card card-small bg-secondary" >
                                  <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                      <div class="stats-small__data text-center">
                                        <span class="stats-small__label text-uppercase" style="color:white">OFF</span>
                                        <h6 class="stats-small__value count my-3" style="color:white">Loker 1</h6>
                                      </div>
                                    </div>
                                  </div>    
                               </div>
                              </div>';
                             
                              }else{ // jika terdapat entri maka tampilkan datanya
                              
                               echo'<div class="col-lg col-md-6 col-sm-6 mb-4" >';     
                                while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
                                  

                                    if ($row['status']== "DIGUNAKAN"){
                                      echo' <div class="stats-small stats-small--1 card card-small bg-c-pink" > 
                                     
                                      ';
                                      echo " <meta http-equiv=\"refresh\" content=\" window.history.go(-1)\" /> ";
                                      
                                          
                                    }
                                    else if ($row['status']== "SELESAI"){
                                      echo' <div class="stats-small stats-small--1 card card-small bg-c-blue" > 
                                      
                                      
                                  
                                      
                                      ';
                                      echo " <meta http-equiv=\"refresh\" content=\" window.history.go(-1)\" /> ";

                                          
                                    }
                                    else{
                                      echo' <div class="stats-small stats-small--1 card card-small bg-secondary" > 
                                      
                                  
                                      ';
                                      echo " <meta http-equiv=\"refresh\" content=\" window.history.go(-1)\" /> ";

                                    }
                              

                              echo '
                             
                            <div class="card-body p-0 d-flex">
                              <div class="d-flex flex-column m-auto">
                                <div class="stats-small__data text-center">
                                  <span class="stats-small__label text-uppercase" style="color:white" >';

                              if ($row['status']== "DIGUNAKAN"){
                                echo'DIGUNAKAN ';

                              }
                              else if ($row['status']== "SELESAI"){
                                echo'TERSEDIA';

                              }
                              else{
                                echo'OFF';

                              }
                           
                                    
                                  
                              
                            echo'       
                            </span>
                            
                            <h6 class="stats-small__value count my-3" style="color:white">Loker 1</h6>

                            <a style="color:white">'.date('h:i:s A',strtotime($row['waktu'])).'</a>
                            
                            ';
                            }
                         ?>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php
                }
              ?>
              
                          
                          <?php
                            //  $sql = mysqli_query($koneksi, "SELECT * FROM datakartu ORDER BY id DESC");
                            //$sql = mysqli_query($koneksi, "SELECT `status` FROM loker WHERE loker = 2");
                            $sql = mysqli_query($koneksi, "SELECT `status` FROM datakartu WHERE loker =  2 ORDER BY id DESC LIMIT 1");
                              if(mysqli_num_rows($sql) == 0){ 
                              // echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
                            echo'
                            <div class="col-lg col-md-4 col-sm-6 mb-4">
                              <div class="stats-small stats-small--1 card card-small bg-secondary" >
                                 <div class="card-body p-0 d-flex">
                                   <div class="d-flex flex-column m-auto">
                                     <div class="stats-small__data text-center">
                                       <span class="stats-small__label text-uppercase" style="color:white">OFF</span>
                                       <h6 class="stats-small__value count my-3" style="color:white">Loker 2</h6>
                                     </div>
                                   </div>
                                 </div>    
                              </div>
                             </div>';


                              }else{ // jika terdapat entri maka tampilkan datanya
                                
                                echo'<div class="col-lg col-md-6 col-sm-6 mb-4">';       
                                while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-pink" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-blue" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else{
                                    echo' <div class="stats-small stats-small--1 card card-small bg-secondary" > ';
                                  // echo " <meta http-equiv=\"refresh\" content=\"\" /> ";

                                  }


                              echo '
                             
                            <div class="card-body p-0 d-flex">
                              <div class="d-flex flex-column m-auto">
                                <div class="stats-small__data text-center">
                                  <span class="stats-small__label text-uppercase" style="color:white" >';

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo'DIGUNAKAN ';
    
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo'TERSEDIA';
    
                                  }
                                  else{
                                    echo'OFF';
    
                                  }

                                      // echo '
                                      //  '.$row['status'].'
                                      // ';
                                    
                                    }
                                  
                                  
                                  ?>

                          </span>
                          <h6 class="stats-small__value count my-3" style="color:white">Loker 2</h6>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                              }
              ?>

                  
<?php
                            //  $sql = mysqli_query($koneksi, "SELECT * FROM datakartu ORDER BY id DESC");
                            //$sql = mysqli_query($koneksi, "SELECT `status` FROM loker WHERE loker = 2");
                            $sql = mysqli_query($koneksi, "SELECT `status` FROM datakartu WHERE loker =  3 ORDER BY id DESC LIMIT 1");
                              if(mysqli_num_rows($sql) == 0){ 
                              // echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
                            echo'
                            <div class="col-lg col-md-4 col-sm-6 mb-4">
                              <div class="stats-small stats-small--1 card card-small bg-secondary" >
                                 <div class="card-body p-0 d-flex">
                                   <div class="d-flex flex-column m-auto">
                                     <div class="stats-small__data text-center">
                                       <span class="stats-small__label text-uppercase" style="color:white">OFF</span>
                                       <h6 class="stats-small__value count my-3" style="color:white">Loker 3</h6>
                                     </div>
                                   </div>
                                 </div>    
                              </div>
                             </div>';


                              }else{ // jika terdapat entri maka tampilkan datanya
                                
                                echo'<div class="col-lg col-md-6 col-sm-6 mb-4">';       
                                while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-pink" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-blue" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else{
                                    echo' <div class="stats-small stats-small--1 card card-small bg-secondary" > ';
                                  // echo " <meta http-equiv=\"refresh\" content=\"\" /> ";

                                  }


                              echo '
                             
                            <div class="card-body p-0 d-flex">
                              <div class="d-flex flex-column m-auto">
                                <div class="stats-small__data text-center">
                                  <span class="stats-small__label text-uppercase" style="color:white" >';

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo'DIGUNAKAN ';
    
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo'TERSEDIA';
    
                                  }
                                  else{
                                    echo'OFF';
    
                                  }

                                      // echo '
                                      //  '.$row['status'].'
                                      // ';
                                    
                                    }
                                  
                                  
                                  ?>

                          </span>
                          <h6 class="stats-small__value count my-3" style="color:white">Loker 3</h6>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                              }
              ?>
                  
                  <?php
                            //  $sql = mysqli_query($koneksi, "SELECT * FROM datakartu ORDER BY id DESC");
                            //$sql = mysqli_query($koneksi, "SELECT `status` FROM loker WHERE loker = 2");
                            $sql = mysqli_query($koneksi, "SELECT `status` FROM datakartu WHERE loker =  4 ORDER BY id DESC LIMIT 1");
                              if(mysqli_num_rows($sql) == 0){ 
                              // echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
                            echo'
                            <div class="col-lg col-md-4 col-sm-6 mb-4">
                              <div class="stats-small stats-small--1 card card-small bg-secondary" >
                                 <div class="card-body p-0 d-flex">
                                   <div class="d-flex flex-column m-auto">
                                     <div class="stats-small__data text-center">
                                       <span class="stats-small__label text-uppercase" style="color:white">OFF</span>
                                       <h6 class="stats-small__value count my-3" style="color:white">Loker 4</h6>
                                     </div>
                                   </div>
                                 </div>    
                              </div>
                             </div>';


                              }else{ // jika terdapat entri maka tampilkan datanya
                                
                                echo'<div class="col-lg col-md-6 col-sm-6 mb-4">';       
                                while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-pink" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-blue" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else{
                                    echo' <div class="stats-small stats-small--1 card card-small bg-secondary" > ';
                                  // echo " <meta http-equiv=\"refresh\" content=\"\" /> ";

                                  }


                              echo '
                             
                            <div class="card-body p-0 d-flex">
                              <div class="d-flex flex-column m-auto">
                                <div class="stats-small__data text-center">
                                  <span class="stats-small__label text-uppercase" style="color:white" >';

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo'DIGUNAKAN ';
    
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo'TERSEDIA';
    
                                  }
                                  else{
                                    echo'OFF';
    
                                  }

                                      // echo '
                                      //  '.$row['status'].'
                                      // ';
                                    
                                    }
                                  
                                  
                                  ?>

                          </span>
                          <h6 class="stats-small__value count my-3" style="color:white">Loker 4</h6>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                              }
              ?>
                  
                  <?php
                            //  $sql = mysqli_query($koneksi, "SELECT * FROM datakartu ORDER BY id DESC");
                            //$sql = mysqli_query($koneksi, "SELECT `status` FROM loker WHERE loker = 2");
                            $sql = mysqli_query($koneksi, "SELECT `status` FROM datakartu WHERE loker =  5 ORDER BY id DESC LIMIT 1");
                              if(mysqli_num_rows($sql) == 0){ 
                              // echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
                            echo'
                            <div class="col-lg col-md-4 col-sm-6 mb-4">
                              <div class="stats-small stats-small--1 card card-small bg-secondary" >
                                 <div class="card-body p-0 d-flex">
                                   <div class="d-flex flex-column m-auto">
                                     <div class="stats-small__data text-center">
                                       <span class="stats-small__label text-uppercase" style="color:white">OFF</span>
                                       <h6 class="stats-small__value count my-3" style="color:white">Loker 5</h6>
                                     </div>
                                   </div>
                                 </div>    
                              </div>
                             </div>';


                              }else{ // jika terdapat entri maka tampilkan datanya
                                
                                echo'<div class="col-lg col-md-6 col-sm-6 mb-4">';       
                                while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-pink" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-blue" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else{
                                    echo' <div class="stats-small stats-small--1 card card-small bg-secondary" > ';
                                  // echo " <meta http-equiv=\"refresh\" content=\"\" /> ";

                                  }


                              echo '
                             
                            <div class="card-body p-0 d-flex">
                              <div class="d-flex flex-column m-auto">
                                <div class="stats-small__data text-center">
                                  <span class="stats-small__label text-uppercase" style="color:white" >';

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo'DIGUNAKAN ';
    
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo'TERSEDIA';
    
                                  }
                                  else{
                                    echo'OFF';
    
                                  }

                                      // echo '
                                      //  '.$row['status'].'
                                      // ';
                                    
                                    }
                                  
                                  
                                  ?>

                          </span>
                          <h6 class="stats-small__value count my-3" style="color:white">Loker 5</h6>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                              }
              ?>
                
                <?php
                            //  $sql = mysqli_query($koneksi, "SELECT * FROM datakartu ORDER BY id DESC");
                            //$sql = mysqli_query($koneksi, "SELECT `status` FROM loker WHERE loker = 2");
                            $sql = mysqli_query($koneksi, "SELECT `status` FROM datakartu WHERE loker =  6 ORDER BY id DESC LIMIT 1");
                              if(mysqli_num_rows($sql) == 0){ 
                              // echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
                            echo'
                            <div class="col-lg col-md-4 col-sm-6 mb-4">
                              <div class="stats-small stats-small--1 card card-small bg-secondary" >
                                 <div class="card-body p-0 d-flex">
                                   <div class="d-flex flex-column m-auto">
                                     <div class="stats-small__data text-center">
                                       <span class="stats-small__label text-uppercase" style="color:white">OFF</span>
                                       <h6 class="stats-small__value count my-3" style="color:white">Loker 6</h6>
                                     </div>
                                   </div>
                                 </div>    
                              </div>
                             </div>';


                              }else{ // jika terdapat entri maka tampilkan datanya
                                
                                echo'<div class="col-lg col-md-6 col-sm-6 mb-4">';       
                                while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-pink" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo' <div class="stats-small stats-small--1 card card-small bg-c-blue" > ';
                                    //echo " <meta http-equiv=\"refresh\" content=\"\" /> ";
                                        
                                  }
                                  else{
                                    echo' <div class="stats-small stats-small--1 card card-small bg-secondary" > ';
                                  // echo " <meta http-equiv=\"refresh\" content=\"\" /> ";

                                  }


                              echo '
                             
                            <div class="card-body p-0 d-flex">
                              <div class="d-flex flex-column m-auto">
                                <div class="stats-small__data text-center">
                                  <span class="stats-small__label text-uppercase" style="color:white" >';

                                  if ($row['status']== "DIGUNAKAN"){
                                    echo'DIGUNAKAN ';
    
                                  }
                                  else if ($row['status']== "SELESAI"){
                                    echo'TERSEDIA';
    
                                  }
                                  else{
                                    echo'OFF';
    
                                  }

                                      // echo '
                                      //  '.$row['status'].'
                                      // ';
                                    
                                    }
                                  
                                  
                                  ?>

                          </span>
                          <h6 class="stats-small__value count my-3" style="color:white">Loker 6</h6>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                              }
              ?>
            </div>
            <!-- End Small Stats Blocks -->
            <div class="row">
              <!-- Users Stats -->
              <div class="col-lg-12 col-md-12 col-sm-12 mb-4">


            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                

                  <div class="card-body p-0 pb-3 text-center" style="overflow-y:auto;">

                    
                    <table class="table table-striped" >
                      <thead class="bg-light">
                        <tr class="table-primary">
                          <th scope="col" class="border-0">Nomor</th>
                          <th scope="col" class="border-0">Loker</th>
                          <th scope="col" class="border-0">Keadaan Pintu</th>
                       
                        </tr>
                      </thead>
                      <tbody>
                      <?php
 
 //  $sql = mysqli_query($koneksi, "SELECT * FROM datakartu ORDER BY id DESC");
    // $sql = mysqli_query ($koneksi,"UPDATE `loker` SET `status`= `DIGUNAKAN` WHERE loker=('".$_GET["loker"]."')"); 
   $sql = mysqli_query($koneksi, "SELECT * FROM loker");
  
 //  $sql = mysqli_query($koneksi, "SELECT  datakartu.idkartu FROM datakartu ORDER BY id DESC LIMIT 1");
   if(mysqli_num_rows($sql) == 0){ 
     echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
   }else{ // jika terdapat entri maka tampilkan datanya
     
     $no = 1; // mewakili data dari nomor 1
     while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
 
       echo '
       <tr>
         <td>'.$no.'</td>
         <td>Loker ' .$row['loker'].'</td>
         <td>'.$row['status'].'</td>
        
       </tr>
       ';
       $no++; // mewakili data kedua dan seterusnya
     }
   }


   ?> 

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- End Default Light Table -->
              
              </div>
            </div>
            
            </div>
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top fixed-bottom">
            <ul class="nav">

            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2021
              <a href="https://designrevision.com" rel="nofollow">Tugas Akhir</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-blog-overview.1.1.0.js"></script>





  </body>
</html>