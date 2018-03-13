<?PHP
session_start();
$id=$_SESSION['Id'];
session_destroy();
	
$conn = mysqli_connect("localhost", "neofelipeas", "", "c9");
$query = "UPDATE usuario SET estatus=0 WHERE id='".$id."';";
echo $query;
mysqli_query($conn, $query);
mysqli_commit($conn);
mysqli_close($conn);

header ("Location: index.php?msg=Fin de la sesion");
?>
