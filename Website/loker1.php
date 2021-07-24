<?php
require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database

$sql = mysqli_query($koneksi, "SELECT chip FROM loker1");
if(mysqli_num_rows($sql) == 0){ 
    echo 'tersedia'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
  }else{ // jika terdapat entri maka tampilkan datanya
    while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
        
        echo''.$row['chip'].'';

    }
  
}


?>