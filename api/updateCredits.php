<?php 
	include '../d/db.php';
	$brandid = mysql_escape_string($_GET['token']);
	$connect = new DatabaseConnect();
	$db = $connect->connect();
	if($db){
		$query = "UPDATE brands set credits=".$
	}

?>