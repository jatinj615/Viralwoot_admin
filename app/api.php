<?php
	include '../d/db.php';
	$connect = new DatabaseConnect();
	$db = $connect->connect();
	if($db){
		$search_token = mysql_escape_string($_REQUEST['search_token']);
		$field = mysql_escape_string(strtolower($_REQUEST['field']));
		if($field=="name"){
			$query = "SELECT fname,lname,email,joindate,id from users where fname='".$search_token."'";	
		}elseif ($field == "email") {
			$query = "SELECT fname,lname,email,joindate,id from users where email='".$search_token."'";
		}elseif ($field == "masterid") {
			$query = "SELECT fname,lname,email,joindate,id from users where id=".$search_token;
		}elseif($field == "brandid"){
			$query == "";
		}
		$result = mysql_query($query);echo mysql_error();
		echo mysql_num_rows($result);
		if($result && mysql_num_rows($result) >= 0){
			$row = mysql_fetch_assoc($result);
			print_r(json_encode($row));
		}
	}else{
		echo "Error";
	}

?>