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
<html>
<head>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="9"> -->
    <title>Data Pengguna Loker</title>
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
	<style type="text/css">
		.box-title{
			border-radius: 5px;
			box-shadow: 0px 0px 3px 1px gray;
			padding: 10px 0px;
		}
		.error-msg{
			color: #dc3545;
			font-weight: 600;
		}
		.success-msg{
			color: green;
			font-weight: 600;
		}
	</style>
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
                  <input class="navbar-search form-control" type="text" id="search" placeholder="Pencarian" aria-label="Search"> </div>
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

            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Data Pengguna</h3>
              </div>
            </div>
          
                 <p class="text-right">
        
                      
                
				<!-- <input type="text" id="search" class="form-control" placeholder="Pencarian"> -->
               
                <button type="button" class="btn btn-accent" data-toggle="modal" data-target="#exampleModalCenter" title="Tambah Data"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp Tambah</button>
                </p>  
                
			        <div  id="tbl_rec">
                     <!-- table -->
		
                    </div>
                   
                
                </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top fixed-bottom">
                <span class="copyright ml-auto my-auto mr-2">Copyright © 2021
                <a href="https://designrevision.com" rel="nofollow">Tugas Akhir</a>
                </span>
          </footer>
        </main>
      </div>
    </div>
          
		
	
<!-- Insert Design Modal -->
	
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="ins_rec">
	      <div class="modal-body">
			  	<div class="form-group">
					<label><b>Nama Lengkap</b></label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
					<span class="error-msg" id="msg_1"></span>
			  	</div>
			  	<div class="form-group">
					<label><b>Email</b></label>
					<input type="text" name="email" class="form-control" placeholder="YourEmail@email.com">
					<span class="error-msg" id="msg_2"></span>
                </div>
                <div class="form-group">
					<label><b>Id Tag</b></label>
					<input type="text" name="tag" class="form-control" placeholder="39B80E">
					<span class="error-msg" id="msg_3"></span>
			  	</div>  
			
				<div class="form-group">
					<label><b>No. Handphone</b></label>
                    <input type="text" name="nohp" class="form-control" placeholder="0822xxxxxxx">
                    <p>
                    <span class="error-msg" id="msg_5"></span>
                    </p>
			  	</div>
				<div class="form-group">
					<label class="mr-3"><b>Jenis Kelamin :- </b></label>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="jeniskelamin" value="Laki-laki" checked>
					  <label class="form-check-label" >Laki-laki</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="jeniskelamin" value="Perempuan">
					  <label class="form-check-label" >Perempuan</label>
					</div>
				
				</div>	
				<div class="form-group">
					<span class="success-msg" id="sc_msg"></span>
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" id="close_click" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary" >Tambah data</button>
	      </div>
      </form>
    </div>
  </div>
</div>
	
<!-- End Insert Modal -->
		
<!-- Update Design Modal -->
	
<div class="modal fade" id="updateModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalCenterTitle">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="updata">
      <div class="modal-body">
		  	<div class="form-group">
				<label><b>Nama Lengkap</b></label>
				<input type="text" class="form-control" name="nama" id="upd_1" placeholder="Nama Lengkap">
				<span class="error-msg" id="umsg_1"></span>
		  	</div>
		  	<div class="form-group">
				<label><b>Email</b></label>
				<input type="text" class="form-control" name="email" id="upd_2" placeholder="YourEmail@email.com">
				<span class="error-msg" id="umsg_2"></span>
		  	</div>
            <div class="form-group">
				<label><b>Id Tag</b></label>
				<input type="text" class="form-control" name="tag" id="upd_3" placeholder="39B80E">
				<span class="error-msg" id="umsg_3"></span>
		  	</div>
			<div class="form-group">
				<label><b>No. Handphone</b></label>
				<input type="text" class="form-control" id="upd_4" name="nohp" placeholder="0822xxxxxxxx">
				<span class="error-msg" id="umsg_4"></span>
		  	</div>
			<div class="form-group">
				<label><b>Jenis Kelamin</b></label>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" id="upd_5" name="jeniskelamin" value="Laki-laki">
				  <label class="form-check-label" >Laki-laki</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" id="upd_6" name="jeniskelamin" value="Perempuan">
				  <label class="form-check-label" >Perempuan</label>
				</div>
				<span class="success-msg" id="umsg_5"></span>
			</div>
			<div class="form-group">
				<input type="hidden" name="dataval" id="upd_7">
				<span class="success-msg" id="umsg_6"></span>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="up_cancle">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah data</button>
      </div>
      </form>	
    </div>
  </div>
</div>	
	
<!-- End Update Design Modal -->
	
<!-- Delete Design Modal -->	
<div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
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
        <button type="button" class="btn btn-primary" id="deleterec">Hapus</button>
      </div>
    </div>
  </div>
</div>	
	
<!-- End Delete Design Modal -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
	
$(document).ready(function (){
	$('#tbl_rec').load('record.php');

	$('#search').keyup(function (){
		var search_data = $(this).val();
		$('#tbl_rec').load('record.php', {keyword:search_data});
	});

	//insert Record

	$('#ins_rec').on("submit", function(e){
		e.preventDefault();
		$.ajax({

			type:'POST',
			url:'insprocess.php',
			data:$(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#close_click').trigger('click');
				}
				else if(json.status == 102){
					$('#sc_msg').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 103){
					$('#msg_1').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 104){
					$('#msg_2').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 105){
					$('#msg_3').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 106){
					$('#msg_4').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 107){
					$('#msg_5').text(json.msg);
					console.log(json.msg);
				}
				else{
					console.log(json.msg);
				}

			}

		});

	});

	//select data

	$(document).on("click", "button.editdata", function(){
		$('#umsg_1').text("");
		$('#umsg_2').text("");
		$('#umsg_3').text("");
		$('#umsg_4').text("");
		$('#umsg_5').text("");
		$('#umsg_6').text("");
		$('#umsg_7').text("");
		var check_id = $(this).data('dataid');
		$.getJSON("updateprocess.php", {checkid : check_id}, function(json){
			if(json.status == 0){
				$('#upd_1').val(json.nama);
				$('#upd_2').val(json.email);
				$('#upd_3').val(json.tag);
				$('#upd_4').val(json.nohp);
				$('#upd_7').val(check_id);
				if(json.jeniskelamin == 'Laki-laki'){
					$('#upd_5').prop("checked", true);
				}
				else{
					$('#upd_6').prop("checked", true);
				}
			}
			else{
				console.log(json.msg);
			}
		});
	});

	//Update Record

	$('#updata').on("submit", function(e){
		e.preventDefault();

		$.ajax({

			type:'POST',
			url:'updateprocess2.php',
			data:$(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#up_cancle').trigger('click');
				}
				else if(json.status == 102){
					$('#umsg_6').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 103){
					$('#umsg_1').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 104){
					$('#umsg_2').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 105){
					$('#umsg_3').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 107){
					$('#umsg_4').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 106){
					$('#umsg_5').text(json.msg);
					console.log(json.msg);
				}

				else{
					console.log(json.msg);
				}

			}

		});

	});

	//delete record

	var deleteid;

	$(document).on("click", "button.deletedata", function(){
		deleteid = $(this).data("dataid");
	});

	$('#deleterec').click(function (){
		$.ajax({
			type:'POST',
			url:'deleteprocess.php',
			data:{delete_id : deleteid},
			success:function(data){
				var json = JSON.parse(data);
				if(json.status == 0){
					$('#tbl_rec').load('record.php');
					$('#de_cancle').trigger("click");
					console.log(json.msg);
				}
				else{
					console.log(json.msg);
				}
			}
		});
	});


});

</script>

</body>
</html>
