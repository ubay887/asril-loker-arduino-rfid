<?php
 
    //Variabel database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbrfid";
 
    $conn = mysqli_connect("$servername", "$username", "$password","$dbname");
 
    // Prepare the SQL statement
    
    $result = mysqli_query ($conn,"INSERT INTO datakartu (`loker`,`status`,`idkartu`) VALUES ('".$_GET["loker"]."','".$_GET["status"]."','".$_GET["idkartu"]."')"); 
      


    if (!$result) 
        {
            die ('Invalid query: '.mysqli_error($conn));
        }  
?>