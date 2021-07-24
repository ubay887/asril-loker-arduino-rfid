<?php
require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Penggunaan Loker</title>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- <meta http-equiv="refresh" content="9"> -->
  <title>Riwayat Penggunaan Loker</title>




</head>
<body>
            
                <span class="text-uppercase page-subtitle">Overview</span>
                <h2 class="page-title">Riwayat Penggunaan Loker</h2>';
              


                $html .=' 
                <p>
                Today is '. date("Y/m/d") .'<br>
                <p/>

                '; 
                          

$html .='                <table border="1" cellpadding="10" cellspacing="0" >
                      <thead>
                        <tr>
                          <th scope="col" class="border-0">Nomor</th>
                          <th scope="col" class="border-0">Nama</th>
                          <th scope="col" class="border-0">Id Kartu</th>
                          <th scope="col" class="border-0">No Loker</th>
                          <th scope="col" class="border-0">Status</th>
                          <th scope="col" class="border-0">Waktu</th>
                        </tr>
                      </thead>
                      <tbody>';

                      $sql = mysqli_query($koneksi, "SELECT user.u_name, datakartu.loker, datakartu.idkartu, datakartu.waktu, datakartu.status FROM datakartu LEFT JOIN user ON datakartu.idkartu=user.id_tag ORDER BY id DESC");
                      if(mysqli_num_rows($sql) == 0){ 

                      $html .='
                      <h3 text-align: center;>
                      Data tidak ada
                      <h3/>
                      ';

                      }else{

                        $no = 1; // mewakili data dari nomor 1
                        while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
                    
                        
                        $html .='
                       
                          <tr>
                            <td>'.$no.'</td>
                            <td>'.$row['u_name'].'</td>
                            <td>'.$row['idkartu'].'</td>
                            <td>Loker 0'.$row['loker'].'</td>
                            <td>'.($row['status'].'</td>
                            <td>'.$row['waktu']).'</td>
                          </tr>
                          ';
                          $no++; // mewakili data kedua dan seterusnya
                        }
                      }
              
                   
                      
$html .='                      </tbody>
                   </table>
  
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();

?>


