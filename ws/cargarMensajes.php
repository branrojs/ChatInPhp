<?php

    session_start();
    require dirname(__FILE__) . '/../config/config.php';
    $con=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB);
    
    if (mysqli_connect_errno())
    {
        echo "Fallo en conectar: " . mysqli_connect_error();
    }
    
    $queryS1 = "Select * From bloqueo where IdBloqueado=".$_SESSION['Id']." AND idUsuario=".$idContacto.""; //el me bloqueo
    $queryS2 = "Select * From bloqueo where IdBloqueado=".$idContacto." AND idUsuario=".$_SESSION['Id']."";// yo lo bloquee
    
    
    
    if (!$sql1 = mysqli_query($con,$queryS1)) {
        $idContacto=$_GET['id'];
        $query="SELECT * FROM mensaje where idRemitente=".$idContacto." AND idDestinatario=".$_SESSION['Id'].";";
        
        $sql = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($sql))
        {
         $msg[] = $row;
        }
    }
    //para que vuelva como antes, quitar los if y los querys y sql 1 y 2
   if (!$sql2 = mysqli_query($con,$queryS2)) {
        $query="SELECT * FROM mensaje where idRemitente=".$_SESSION['Id']." AND idDestinatario=".$idContacto.";";
        $sql = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($sql))
        {
            $msg[] = $row;
        }
   }
    mysqli_close($con);
    
    header('Content-Type: application/json');
    echo json_encode($msg);

?>