<?php
    session_start();
    require dirname(__FILE__) . '/../config/config.php';
    $con=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB);
    
    if (mysqli_connect_errno())
    {
    echo "Fallo en conectar: " . mysqli_connect_error();
    }
    
    $remitente = $_SESSION['Id'];
    $destinatario=$_GET['id'];
    
    $sql="INSERT INTO bloqueo (idBloqueado, idUsuario) VALUES (".$destinatario.",".$remitente.")";
    
    $result = mysqli_query( $con , $sql);
    mysqli_commit($con);
    mysqli_close($con);

?>