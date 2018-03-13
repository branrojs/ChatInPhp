<?php


	session_start();
	$UserOn=$_SESSION['Usuario'];

	require dirname(__FILE__) . '/config/config.php';
	$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB);
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$query="SELECT ids, nombre , estatus FROM usuario";
	if($result = mysqli_query($conn, $query)) {
			echo "
			<tr>
			<th>Usuario</th>
			<th>Estatus</th>
			</tr>";
			var_dump($_SESSION['Usuario']);
			while($row = mysqli_fetch_row($result))
			{
				
					var_dump($row);
				if ($row[0]!=$_SESSION['Usuario']) {
					echo "<tr>";
					echo "<td><a href='Sala.php?recepnum=".$row[0]."&receptor=".$row[2]."&emisor=".$_SESSION['Ids']."' >".$row[0]."</a></td>";
					if ($row[1]==1) {
						echo "<td> Online </td>";
					}else{
						echo "<td> Offline </td>";
					}
					echo "</tr>";
				}
			}
			echo "</table>";
	}
	

	
	mysqli_close($conn);

?>