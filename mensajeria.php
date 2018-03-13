<?php

$cedula = $_GET['ced'];

$sql = "SELECT * FROM Cliente WHERE Cedula = ? order by CodEstado";
$params=array($cedula);
$getresult = $conn->prepare($sql);
$getresult->execute($params);
$result = $getresult->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);

?>