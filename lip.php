<?php

session_start();
//global $no_constraints;

include_once('class.mysql.php');

function getConn()
{
	global $conn;
	$ini = parse_ini_file("define.ini.php", TRUE);
	$conn = new mysql($ini['database']['db_user'], $ini['database']['db_pass'], $ini['database']['db_host'], $ini['database']['db_name']);
}

?>
