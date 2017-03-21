<?php
	ob_start();
	include_once("../lip.php");
	getConn();	
	
	$code = $_POST['code'];
	$name = $_POST['name'];
	$rate = $_POST['rate'];	
	$result = array();
	$query = "insert into currency (code,name,rate) VALUES ('$code','$name','$rate')";
	$data = $conn->insert($query);
	if($data){
		$result['success'] = true;
		$result['msg'] = "Successfully Inserted";	
	}else{
		$result['success'] = false;
		$result['msg'] = "Record Not Inserted";	
	}
	echo json_encode($result);
?>