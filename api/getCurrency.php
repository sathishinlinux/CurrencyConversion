<?php
	ob_start();
	include_once("../lip.php");
	getConn();	
	$query = "select * from currency";
	$data = $conn->select($query);
	
	echo json_encode($data);
?>