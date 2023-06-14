<?php 
require './conexion.php';

$query= "SELECT 'fechaentraga' from oc ";

$result= mysqli_query($conn, $query);  
$json=array();
$i=0;
while($row = mysqli_fetch_array($result))
{
	$i++;
} 

 ?>