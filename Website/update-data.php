<?php
 
    //Variabel database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbrfid";
 
    $conn = mysqli_connect("$servername", "$username", "$password","$dbname");
 
    // Prepare the SQL statement
    
    //$result = mysqli_query ($conn,"INSERT INTO datakartu (loker,idkartu) VALUES ('".$_GET["loker"]."','".$_GET["idkartu"]."')"); 
    $result = mysqli_query ($conn,"UPDATE `loker` SET `status`= ('".$_GET["status"]."') WHERE loker=('".$_GET["loker"]."')"); 

      

    
    if (!$result) 
        {
            die ('Invalid query: '.mysqli_error($conn));
        }  


?>