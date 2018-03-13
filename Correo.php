<?php
    session_start();
    
    require dirname(__FILE__) . '/config/config.php';
    
    $con=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB);
    
    $nomContacto=$_GET['nom'];
    if (mysqli_connect_errno())	{
    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $query = "SELECT email FROM usuario Where nombre='".$nomContacto."';";
    if ($result = mysqli_query($con, $query)) {
        while ($fila = mysqli_fetch_assoc($result)) {
         
            $to      = "branrojs@gmail.com";
            $subject = "Alguien quiere hablar contigo!! Conectate.";
            $message = "El usuario".$_SESSION['Usuario']." Quiere hablar contigo, conectate y hablen por el chat!";
            $headers = 'From: bran.cucspace@gmail.com' . "\r\n" .
                'Reply-To: branrojs@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            
            mail($to, $subject, $message, $headers);
            
            
        }
	    
        
    }
?>