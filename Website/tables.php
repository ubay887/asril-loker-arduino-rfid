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
    <title>Riwayat Penggunaan Loker</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <link href="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" rel="stylesheet">
    <link href="https://code.jquery.com/jquery-3.5.1.js" rel="stylesheet">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://kit.fontawesome.com/36344b9b01.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">

    <script>
        header('Location: '.$_SERVER['REQUEST_URI']);
    </script>

  </head>
  <body class="h-100" showdata>
  
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0" class="mainnavbar">
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
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="beranda.php">
                  <i class="material-icons">edit</i>
                  <span>Status Loker</span>
                </a>

              <li class="nav-item">
                <a class="nav-link active" href="tables.php">
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
            <!-- Main Navbar -->
           
          <!-- / .main-navbar -->
          <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <!-- <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control" type="text" id="search" placeholder="Pencarian"  aria-label="Search"> </div> -->
              </form>
              <ul class="navbar-nav border-left flex-row ">
               
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/avatars/2.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block"> <?php echo $_SESSION['nama']; ?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
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
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Riwayat Penggunaan Loker</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
                  <p class="text-right">
                    <a href="ekspor.php" target="_blank">
                      <button name="download" type="submit" class="btn btn-accent" title="Unduh"><i class="fa fa-download" aria-hidden="true"></i></button>
                    </a>
                    <a href="grafik.php">
                      <button name="grafik" type="submit" class="btn btn-warning" title="Grafik"><i class="fa fa-bar-chart"></i></button>
                    </a>
                    
                      <button name="hapus" type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalCenter2" title="Hapus"><i class="fa fa-trash"></i></button>
                    
                  </p>

                  
                  
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                

                  <div class="card-body p-0 pb-3 text-center" style="overflow-y:auto;">

                    
                    <table class="table table-striped" >
                      <thead class="bg-light">
                        <tr class="table-primary">
                          <th scope="col" class="border-0">Nomor</th>
                          <th scope="col" class="border-0">Nama</th>
                          <th scope="col" class="border-0">Id Kartu</th>
                          <th scope="col" class="border-0">No Loker</th>
                          <th scope="col" class="border-0">Status</th>
                          <th scope="col" class="border-0">Waktu</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
 
 //  $sql = mysqli_query($koneksi, "SELECT * FROM datakartu ORDER BY id DESC");
    // $sql = mysqli_query ($koneksi,"UPDATE `loker` SET `status`= `DIGUNAKAN` WHERE loker=('".$_GET["loker"]."')"); 
   $sql = mysqli_query($koneksi, "SELECT user.u_name, datakartu.loker, datakartu.idkartu, datakartu.waktu, datakartu.status FROM datakartu LEFT JOIN user ON datakartu.idkartu=user.id_tag ORDER BY id DESC");
  
 //  $sql = mysqli_query($koneksi, "SELECT  datakartu.idkartu FROM datakartu ORDER BY id DESC LIMIT 1");
   if(mysqli_num_rows($sql) == 0){ 
     echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
   }else{ // jika terdapat entri maka tampilkan datanya
     
     $no = 1; // mewakili data dari nomor 1
     while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
 
       echo '
       <tr>
         <td>'.$no.'</td>
         <td>'.$row['u_name'].'</td>
         <td>'.$row['idkartu'].'</td>
         <td>Loker 0'.$row['loker'].'</td>
         <td>'.$row['status'].'</td>
         <td>'.$row['waktu'].'</td>
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
            <!-- Default Dark Table -->
          
            <!-- End Default Dark Table -->
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top fixed-bottom">
           
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2021
              <a href="https://designrevision.com" rel="nofollow">Tugas Akhir</a>
            </span>
          </footer>
        </main>
      </div>
    </div>


    <!-- Delete Design Modal -->	
<div class="modal fade" id="deleteModalCenter2" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalCenterTitle">Yakin dihapus ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <p>Pastikan data telah di backup.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="de_cancle" data-dismiss="modal">Batal</button>
        <a href="hapus.php">
          <button type="button" class="btn btn-danger">Hapus</button>
        </a>
      </div>
    </div>
  </div>
</div>	
	
<!-- End Delete Design Modal -->

  
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>


  </body>
</html>