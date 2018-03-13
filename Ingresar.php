<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require dirname(__FILE__) . '/config/config.php';
		
	$email = $_POST['email'];
	$clave = $_POST['clave'];
	
	$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB);
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$query = "SELECT * FROM usuario Where email='".$email."';";
	if ($result = mysqli_query($conn, $query)) {
	    $row = mysqli_fetch_row($result);
	    if (strcmp ($clave,$row[3])==0) {
	    	if($row[6]==0){
				$_SESSION['login'] = "1";
				$_SESSION['Id'] = $row[0];
				$_SESSION['Usuario'] = $row[2];
				$_SESSION['Tipo'] = $row[6];
				header ("Location: Administrador.php");
	    	}
			$query = "UPDATE usuario SET estatus=1 WHERE nombre='".$row[2]."';";
			mysqli_query($conn, $query);
	    	mysqli_commit($conn);
		    mysqli_close($conn);
			session_start();
			$_SESSION['login'] = "1";
			$_SESSION['Id'] = $row[0];
			$_SESSION['Usuario'] = $row[2];
			header ("Location: Salacomunal2.php");
		} else {
			session_start();
			$_SESSION['login'] = '';
			header ("Location: index.php?msg=Error");
		}
	}
	}
?>