<?php
$servername = 'localhost';
$username = 'root';
$passsword = '';
$dbname = "db";


$conn = mysqli_connect($servername, $username, $passsword, $dbname);

if(!$conn){
  die("Connection Failed". mysqli_connect_error());
}

?>