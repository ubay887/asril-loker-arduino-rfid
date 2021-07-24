<?php
  require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="5">  -->
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



  <body class="h-100" id=""showdata>
  <?php 
    $index = "index.php";
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "gagal"){
        echo "<script type='text/javascript'>alert('Username atau password salah');window.location='$index'</script>";
      }else if($_GET['pesan'] == "logout"){
        echo "<script type='text/javascript'>alert('Berhasil logout');window.location='$index'</script>";
      }else if($_GET['pesan'] == "belum_login"){
        echo "<script type='text/javascript'>alert('Mohon login terlebih dahulu');window.location='$index'</script>";
      }
    }
    ?>

        
        <main class="main-content  col-md-10 col-sm-10 p-0 offset-lg-1 offset-md-0">
        
            
   
          <p>
          <form action="cek-login.php" method="post" onSubmit="return validasi()">
            <div class="form-inline " >
                <input type="username" class="form-control" name="username" id="username" placeholder="Username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="this.setCustomValidity('')">&nbsp;
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="this.setCustomValidity('')">&nbsp;
               
                <button name="download" type="submit" class="btn btn-success">Masuk</button>
                 
             </div>
             </form>
           </p>
          <div class="main-navbar sticky-top bg-white">
            
          <!-- / .main-navbar -->
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
                          // $sql = mysqli_query($koneksi, "SELECT `status` FROM loker WHERE loker =  1");
                          $sql = mysqli_query($koneksi, "SELECT `status` FROM datakartu WHERE loker =  1 ORDER BY id DESC LIMIT 1");
                      // $sql = mysqli_query($koneksi, "SELECT  loker.status, datakartu.status FROM datakartu LEFT JOIN loker ON datakartu.loker=loker.loker WHERE loker = 1 ORDER BY id DESC LIMIT 1");
                       // $sql1 = mysqli_query($koneksi, "SELECT `status` FROM loker WHERE loker =  1");
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
                                 // while($row1 = mysqli_fetch_assoc($sql1)){ // fetch query yang sesuai ke dalam array
                                  

                                    if ($row['status']== "SELESAI"){
                                      echo' <div class="stats-small stats-small--1 card card-small bg-c-blue" >  ';
                                    
                                        
                                    }
                                    else if ($row['status']== "DIGUNAKAN"){
                                      echo' <div class="stats-small stats-small--1 card card-small bg-c-pink" >  ';
                                    
                                      
                                    }
                                    // else if ($row['status']== "SELESAI" ){
                                    //   echo' <div class="stats-small stats-small--1 card card-small bg-c-blue" >  ';
                                   
                                    // }
                                    // else if ($row['status']== "SELESAI"){
                                    //   echo' <div class="stats-small stats-small--1 card card-small bg-c-yellow" >  ';
                                   
                                    // }
                                    // else if ($row1['status']== "TERBUKA"){
                                    //   echo' <div class="stats-small stats-small--1 card card-small bg-c-yellow" >  ';
                                   
                                    // }


                                    else{
                                      echo' <div class="stats-small stats-small--1 card card-small bg-secondary" >  ';
                                      
                        
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
                        
                                    
                            }
                         
                                  
                            ?>
                                
                          </span>
                          <?php
                             
                          ?>
                          <h6 class="stats-small__value count my-3" style="color:white">Loker 1</h6>
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

                                  // switch($row['status']){
                                  //   case "DIGUNAKAN":
                                  //     echo'DIGUNAKAN';
                                  //     header("location:index.php?pesan=update");
                                  //     break;
                                  //   case "SELESAI":
                                  //     echo'SELESAI';
                                  //     header("location:index.php?pesan=update");
                                  //     break;
                                  //   default:
                                  //     echo'OFF';
                                  //     header("location:index.php?pesan=update");



                                  // }

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
            
            <!-- End Default Light Table -->
              
              </div>
            </div>
            
            </div>
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top fixed-bottom">
            <ul class="nav">

            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2021
              <a href="" rel="nofollow">Tugas Akhir</a>
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