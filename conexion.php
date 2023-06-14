<?php 
$servername = "localhost";
$database = "ventas";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
 echo "conexion fallida";
}
 ?>
