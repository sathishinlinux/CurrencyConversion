<?php
	ob_start();
	include_once("../lip.php");
	getConn();
	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$result = array();

	if($email && $password){
		$query = "select * from users where email='$email' and password='$password'";
		
		$data = $conn->select($query);
		if($data){
			$result['success'] = true;
			$result['msg'] = "Successfully Login in";	
			$_SESSION['userId'] = $data->id;		
		}else{
			$_SESSION['userId'] = null;
			$result['success'] = false;
			$result['msg'] = "Email and password not match in database";	
		}
		
		echo json_encode($result);
	}
	
 ?>
