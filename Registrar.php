<?php
$conn = mysqli_connect("localhost", "neofelipeas", "", "c9");

$email = $_POST['email'];
$name = $_POST['name'];
$pwd = $_POST['pwd'];

$sql="INSERT INTO usuario(nombre,clave,email,estatus,tipo) VALUES('".$name."','".$pwd."','".$email."',0,1);";

if (mysqli_query($conn, $sql)) {
    mysqli_commit($conn);
    mysqli_close($conn);
    header("Location: index.php?msg=Usuario creado con exito.");
} else {
    header("Location: index.php?msg=Error al insertar datos.");
}

?>
