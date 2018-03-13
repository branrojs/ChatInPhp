<?php
    session_start();
	require dirname(__FILE__) . '/../config/config.php';
	$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB);
	
	
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

     $msg = $_GET["msg"];
     $remitente = $_SESSION['Id'];
     $destinatario=$_GET['id'];

     $sql="INSERT INTO mensaje (msg, idRemitente, idDestinatario) values('".$msg."',".$remitente.",".$destinatario.");";

          echo $sql;
     
     $result = mysqli_query( $conn , $sql);
     mysqli_commit($conn);
     if(!$result)
     {
        throw new Exception('Query failed: ' . mysql_error());
        exit();
     }

?>