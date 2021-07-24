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
                                              <a href="edit.php">
                                                <button name="edit" type="submit" class="btn btn-warning">Edit</button>
                                              </a>
                                              <a href="hapusdata.php">
                                                <button name="hapus" type="submit" class="btn btn-danger">Hapus</button>
                                              </a>
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
        
       

  </body>
</html>