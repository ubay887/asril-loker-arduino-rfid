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

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script>
        header('Location: '.$_SERVER['REQUEST_URI']);
    </script>

  </head>
  <body class="h-100">
  
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
                <a class="nav-link" href="tables.php">
                  <i class="material-icons">table_chart</i>
                  <span>Riwayat Penggunaan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="pendaftaran.php">
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

            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control" type="text" placeholder="Pencarian" aria-label="Search"> </div>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">&#xE7F4;</i>
                      <span class="badge badge-pill badge-danger">2</span>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">&#xE6E1;</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category">Analytics</span>
                        <p>Your website’s active users count increased by
                          <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                      </div>
                    </a>
                    <a class="dropdown-item" href="#">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">&#xE8D1;</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category">Sales</span>
                        <p>Last week your store’s sales count decreased by
                          <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                      </div>
                    </a>
                    <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                  </div>
                </li>
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
           
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Data Pengguna</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
                 <p class="text-right">
                      <button type="button" class="btn btn-accent" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data</button>
                  </p>   

                  <!-- Insert Design Modal -->
                     <!-- Modal -->
                      <div id="exampleModalCenter" class="modal fade" role="dialog" >
                        <div class="modal-dialog">
                          <!-- konten modal-->
                          <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                              <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                              <h4 class="modal-title text-center">Pendaftaran</h4>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                              <!-- <p>bagian body modal.</p> -->
                              <form method="POST" id="ins_rec">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Lengkap</label>
                                  <input type="text" class="form-control"  name="nama"  placeholder="ex.Muhammad">
                                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">NIK</label>
                                  <input type="text" class="form-control"  name="noid"  placeholder="ex.1671xxxxxxxxxxx">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">No.Handphone</label>
                                  <input type="text" class="form-control"  name="nohp"  placeholder="ex.0822-xxxx-xxxx">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Id Tag</label>
                                  <input type="text" class="form-control"  name="tag"  placeholder="Tempelkan Kartu">
                                </div>

                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input"  required>
                                  <label class="form-check-label" for="exampleCheck1">Semua data tersebut benar</label>
                                </div>
                                <div class="form-group">
                                  <span class="success-msg" id="sc_msg"></span>
                                </div>
                              
                               
                                
                              </div>

                               <!-- footer modal -->
                              <div class="modal-footer">
                              <button type="submit" class="btn btn-primary tombol-simpan" id="input">Simpan</button>
                                
                                <button type="button" class="btn btn-default " data-dismiss="modal">Batal</button>
                              </div>
                              </form>
                            </div>
                           
                          </div>
                        </div>
                      </div>

                  <!-- End Insert Modal -->

                  <!-- Update Design Modal -->
                     <!-- Modal -->
                     <div id="exampleModalCenter" class="modal fade" role="dialog" >
                        <div class="modal-dialog">
                          <!-- konten modal-->
                          <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                              <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                              <h4 class="modal-title text-center">Update Data</h4>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                              <!-- <p>bagian body modal.</p> -->
                              <form method="POST" id="updata">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Lengkap</label>
                                  <input type="text" class="form-control"  name="nama"  placeholder="ex.Muhammad">
                                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">NIK</label>
                                  <input type="text" class="form-control"  name="noid"  placeholder="ex.1671xxxxxxxxxxx">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">No.Handphone</label>
                                  <input type="text" class="form-control"  name="nohp"  placeholder="ex.0822-xxxx-xxxx">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Id Tag</label>
                                  <input type="text" class="form-control"  name="tag"  placeholder="Tempelkan Kartu">
                                </div>

                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input"  required>
                                  <label class="form-check-label" for="exampleCheck1">Semua data tersebut benar</label>
                                </div>
                                <div class="form-group">
                                  <span class="success-msg" id="sc_msg"></span>
                                </div>
                              
                               
                                
                              </div>

                               <!-- footer modal -->
                              <div class="modal-footer">
                              <button type="submit" class="btn btn-primary tombol-simpan" id="input">Update</button>
                                
                                <button type="button" class="btn btn-default " data-dismiss="modal">Batal</button>
                              </div>
                              </form>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                  <!-- End Update Modal -->

            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-body p-0 pb-3 text-center" style="overflow-y:auto;">

                  <table class="table table-striped data" >
                      <thead class="bg-light">
                        <tr class="table-primary">
                          <th scope="col" class="border-0">Nomor</th>
                          <th scope="col" class="border-0">Nama</th>
                          <th scope="col" class="border-0">No Identitas</th>
                          <th scope="col" class="border-0">No Handphone</th>
                          <th scope="col" class="border-0">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      
                                $data = mysqli_query($koneksi, "SELECT * FROM pengguna");
                                  
                                //  $sql = mysqli_query($koneksi, "SELECT  datakartu.idkartu FROM datakartu ORDER BY id DESC LIMIT 1");
                                  if(mysqli_num_rows($data) == 0){ 
                                    echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
                                  }else{ // jika terdapat entri maka tampilkan datanya
                                    
                                    $no = 1; // mewakili data dari nomor 1
                                    while($d = mysqli_fetch_assoc($data)){ // fetch query yang sesuai ke dalam array
                                
                                      echo '
                                      <tr>
                                        <td>'.$no.'</td>
                                        <td>'.$d['nama'].'</td>
                                        <td>'.$d['no_id'].'</td>
                                        <td>'.$d['hp'].'</td>
                                        <td>  
                                           
                                                <button name="edit" type="submit" class="btn btn-warning editdata" data-dataid='.$d['no'].' data-toggle="modal" data-target="#updateModalCenter">Edit</button>
                                            
                                                <button name="hapus" type="submit" class="btn btn-danger deletedata data-dataid='.$d['no'].' data-toggle="modal" data-target="#deleteModalCenter"">Hapus</button>
                                            
                                        </td>
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
  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>


    <script type="text/javascript">

      $('#input').on('click',function(){
        var nama = $('#Nama').val();
        var noid = $('#Noid').val();
        var nohp = $('#Nohp').val();
        var tag = $('#Tag').val();
     
        $.ajax({
          method: "POST",
          url: "insert.php",
          data: {Nama : nama, No_id : noid, No_hp : nohp, No_tag : tag,type:"insert"},
           
        });
      });
  </script>
  </body>
</html>