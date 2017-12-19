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
			$query = "SELECT users.fname,users.lname,users.email,users.joindate,users.id,brands.masterid,brands.id,brands.name,brands.pinterest,brands.facebook,brands.twitter,brands.instagram,brands.etsy,brands.plan,brands.stripe_customer,brands.stripe_subscription,brands.credits,brands.status,brands.joindate,brands.tz,brands.plan_start,brands.plan_end from users,brands where brands.masterid=users.id and users.email='".$search_token."'";
		}elseif ($field == "masterid") {
			$query = "SELECT users.fname,users.lname,users.email,users.joindate,users.id,brands.masterid,brands.id,brands.name,brands.pinterest,brands.facebook,brands.twitter,brands.instagram,brands.etsy,brands.plan,brands.stripe_customer,brands.stripe_subscription,brands.credits,brands.status,brands.joindate,brands.tz,brands.plan_start,brands.plan_end from users,brands where brands.masterid=users.id and users.id=".$search_token;
		}elseif($field == "brandid"){
			$query == "SELECT masterid,id,name,pinterest,facebook,twitter,instagram,etsy,plan,stripe_customer,stripe_subscription,credits,status,joindate,tz,plan_start,plan_end from brands where id=".$search_token;
		}
		$i = 0;
		$result = mysql_query($query);echo mysql_error();
		echo $query;
		echo mysql_num_rows($result);
		if($result && mysql_num_rows($result) >= 0){
			while($row = mysql_fetch_assoc($result)){
				$data[$i] = $row;
				$i++;
			}
			print_r(json_encode($data));
		}
	}else{
		echo "Error";
	}

?>