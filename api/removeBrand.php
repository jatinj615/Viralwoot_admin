<?php
	include '../d/db.php';
	$brandid = mysql_escape_string($_GET['token']);
	$connect = new DatabaseConnect();
	$db = $connect->connect();
	if($db){
		$query = "DELETE from brands where id=".$brandid;
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