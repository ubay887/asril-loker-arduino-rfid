<?php
  require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="9"> -->
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
    <link rel="stylesheet" href="css.css">
    <script type="text/javascript" src="chartjs/Chart.js"></script>
   

  </head>
  <body class="h-100">
  <?php 
	include 'koneksi.php';
	?>
 
	
  
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
                    <a href="tables.php">
                      <button name="back" type="submit" class="btn btn-success">Kembali</button>
                    </a>
                    
                  
                  </p>

                  
                  
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                
                <div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
                  <div class="card-body p-0 pb-3 text-center" style="overflow-y:auto;">

                  <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Loker 01", "Loker 02", "Loker 03", "Loker 04", "Loker 05"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_loker1 = mysqli_query($koneksi,"select * from datakartu where loker='1' and status='SELESAI'");
					echo mysqli_num_rows($jumlah_loker1);
					?>, 
					<?php 
					$jumlah_loker2 = mysqli_query($koneksi,"select * from datakartu where loker='2' and status='SELESAI'");
					echo mysqli_num_rows($jumlah_loker2);
					?>, 
					<?php 
					$jumlah_loker3 = mysqli_query($koneksi,"select * from datakartu where loker='3' and status='SELESAI'");
					echo mysqli_num_rows($jumlah_loker3);
					?>, 
                    <?php 
					$jumlah_loker4 = mysqli_query($koneksi,"select * from datakartu where loker='4' and status='SELESAI'");
					echo mysqli_num_rows($jumlah_loker4);
					?>, 
					<?php 
					$jumlah_loker5 = mysqli_query($koneksi,"select * from datakartu where loker='5' and status='SELESAI'");
					echo mysqli_num_rows($jumlah_loker5);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
                   
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
  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
  </body>
</html>