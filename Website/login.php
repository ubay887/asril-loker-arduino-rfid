<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysql_query("SELECT * from admin where username='$username' and password='$password'");
$cek = mysql_num_rows($query);
echo $cek;
?>