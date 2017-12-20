<?php
	include '../d/db.php';
	$connect = new DatabaseConnect();
	$db = $connect->connect();
	$i = 0;
	if($db){
		$search_token = mysql_escape_string($_REQUEST['search_token']);
		$field = mysql_escape_string(strtolower($_REQUEST['field']));
		//echo $field;
		if($field=="name"){
			$query = "SELECT fname,lname,email,joindate,id from users where fname='".$search_token."'";
			$result = mysql_query($query);
			if($result && mysql_num_rows($result)> 0){
				while($row = mysql_fetch_assoc($result)){
					$data[$i] = $row;
					$i++;
				}
			}	
		}elseif ($field == "email") {
			$query = "SELECT fname,lname,email,joindate,id from users where email='".$search_token."'";
			$result = mysql_query($query);
			//print_r(mysql_fetch_assoc($result));
			if($result && mysql_num_rows($result)>0){
				$row = mysql_fetch_assoc($result);
				$query = "SELECT users.fname,users.lname,users.email,users.joindate,users.id,brands.masterid,brands.id,brands.name,brands.pinterest,brands.facebook,brands.twitter,brands.instagram,brands.etsy,brands.plan,brands.stripe_customer,brands.stripe_subscription,brands.credits,brands.status,brands.joindate,brands.tz,brands.plan_start,brands.plan_end,plans.name as pname,plans.amount, plans.type,timezone.name as tname from users,brands,plans,timezone where brands.masterid=users.id and brands.plan=plans.id and brands.tz=timezone.id and users.email='".$search_token."'";
				$result = mysql_query($query);
				if($result && mysql_num_rows($result)>0){
					while($row = mysql_fetch_assoc($result)){
						$data[$i] = $row;
						$data[$i]['brands'] = 1;
						$i++;
					}	
				}else{
					while ($row = mysql_fetch_assoc($result)) {
						$data[$i] = $row;
						$data[$i]['brands'] = 0 ;
						$i++;
					}
				}
			}
		}elseif ($field == "masterid") {
			$query = "SELECT fname,lname,email,joindate,id from users where id=".$search_token;
			$result = mysql_query($query);
			if($result && mysql_num_rows($result)>0){
				$row = mysql_fetch_assoc($result);
				$query = "SELECT users.fname,users.lname,users.email,users.joindate,users.id,brands.masterid,brands.id,brands.name,brands.pinterest,brands.facebook,brands.twitter,brands.instagram,brands.etsy,brands.plan,brands.stripe_customer,brands.stripe_subscription,brands.credits,brands.status,brands.joindate,brands.tz,brands.plan_start,brands.plan_end,plans.name as pname,plans.amount, plans.type,timezone.name as tname from users,brands,plans,timezone where brands.masterid=users.id and brands.plan=plans.id and brands.tz=timezone.id and users.id=".$search_token;
				$result = mysql_query($query);
				if($result && mysql_num_rows($result)>0){
					while($row = mysql_fetch_assoc($result)){
						$data[$i] = $row;
						$data[$i]['brands'] = 1;
						$i++;
					}	
				}else{
					while ($row = mysql_fetch_assoc($result)) {
						$data[$i] = $row;
						$data[$i]['brands'] = 0 ;
						$i++;
					}
				}
			}
		}elseif($field == "brandid"){
			$query = "SELECT users.fname,users.lname,users.email,users.joindate,users.id,brands.masterid,brands.id,brands.name,brands.pinterest,brands.facebook,brands.twitter,brands.instagram,brands.etsy,brands.plan,brands.stripe_customer,brands.stripe_subscription,brands.credits,brands.status,brands.joindate,brands.tz,brands.plan_start,brands.plan_end,plans.name as pname,plans.amount, plans.type,timezone.name as tname from users,brands,plans,timezone where brands.masterid=users.id and brands.plan=plans.id and brands.tz=timezone.id and brands.id=".$search_token;
			// echo $query;
			$result = mysql_query($query);
			//echo mysql_num_rows($result);
			if($result && mysql_num_rows($result) > 0 ){
				while ( $row = mysql_fetch_assoc($result) ) {
					$data[$i] = $row;
					$data[$i]['brands'] = 1;
					$i++;
				}
			}

		}
		// $i = 0;
		// $result = mysql_query($query);echo mysql_error();
		//echo $query;
		// echo mysql_num_rows($result);
		// if($result && mysql_num_rows($result) >= 0){
		// 	while($row = mysql_fetch_assoc($result)){
		// 		$data[$i] = $row;
		// 		$i++;
		// 	}
			print_r(json_encode($data));
		// }else{
		// 	echo "No Data";
		// }
	}else{
		echo "Error";
	}

?>