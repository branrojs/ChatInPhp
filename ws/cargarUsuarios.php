<?php

require dirname(__FILE__) . '/../config/config.php';
$con=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB);

if (mysqli_connect_errno())
{
echo "Fallo en conectar: " . mysqli_connect_error();
}
$estatus=$_GET['estatus'];
$query="SELECT * FROM usuario where estatus=".$estatus.";";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
$rows[] = $row;
}

mysqli_close($con);

header('Content-Type: application/json');
echo json_encode($rows);

?>