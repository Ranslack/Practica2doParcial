<?php 
require './conexion.php';

$query = "SELECT DISTINCT fechaentrega from oc order by fechaentrega ASC";

$result= mysqli_query($conn, $query);  

$json=array();
$i=0;
while($row = mysqli_fetch_array($result))
{
	$json[$i]=array(
		'fecha'=>$row['fechaentrega'],
	);
	$i++;
} 
		echo json_encode($json)
 ?>
