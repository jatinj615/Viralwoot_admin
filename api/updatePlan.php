<?php 
	include '../d/db.php';
	$brandid = mysql_escape_string($_GET['token']);
	$planid = mysql_escape_string($_GET['planid']);
	$connect = new DatabaseConnect();
	$db = $connect->connect();
	if($db){
		$query = "UPDATE brands set plan=".$planid."where id=".$brandid;
		$result = mysql_query($query);
		if($result && mysql_affected_rows($result) > 0){
			echo "Success";
		}else{
			echo "Error";
		}
	}else{
		echo "Error";
	}

?>