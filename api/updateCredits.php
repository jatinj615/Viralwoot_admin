<?php 
	include '../d/db.php';
	$brandid = mysql_escape_string($_GET['token']);
	$credits = mysql_escape_string($_GET['credits']);
	echo $credits;
	$connect = new DatabaseConnect();
	$db = $connect->connect();
	if($db){
		$query = "UPDATE brands set credits=".$credits." where id=".$brandid;mysql_error();
		$result = mysql_query($query);
		if($result && mysql_affected_rows($result) > 0){
			echo "Success";
		}else{
			echo "Cannot fetch Data";
		}
	}else{
		echo "Cannot Connect to database";
	}

?>