<?php
 
    //Variabel database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbrfid";
 
    $conn = mysqli_connect("$servername", "$username", "$password","$dbname");
 
    // Prepare the SQL statement
    
    $result = mysqli_query ($conn,"DELETE FROM datakartu"); 
      
    header("location:tables.php?pesan=hapus");

    
    if (!$result) {
        echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
            die ('Invalid query: '.mysqli_error($conn));
    }else{
        echo "<script>alert('Data berhasil di tambahkan!');history.go(-1);</script>";

    }  
?>