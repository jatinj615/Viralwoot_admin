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
					$data['UBA'][$i] = $row;
					$i++;
				}
			}	
		}elseif ($field == "email") {
			$query = "SELECT fname,lname,email,joindate,id from users where email='".$search_token."'";
			$result = mysql_query($query);
			//print_r(mysql_fetch_assoc($result));
			if($result && mysql_num_rows($result)>0){
				$query = "SELECT users.fname,users.lname,users.email,users.joindate,users.id,brands.masterid,brands.id,brands.name,brands.pinterest,brands.facebook,brands.twitter,brands.instagram,brands.etsy,brands.plan,brands.stripe_customer,brands.stripe_subscription,brands.credits,brands.status,brands.joindate,brands.tz,brands.plan_start,brands.plan_end,plans.name as pname,plans.amount, plans.type,timezone.name as tname from users,brands,plans,timezone where brands.masterid=users.id and brands.plan=plans.id and brands.tz=timezone.id and users.email='".$search_token."'";
				if(mysql_query($query) && mysql_num_rows(mysql_query($query)) > 0){
					$result = mysql_query($query);
					while($row = mysql_fetch_assoc($result)){
						$data['UBA'][$i] = $row;
						$data['UBA'][$i]['brands'] = 1;
						$i++;
					}	
				}else{
					while ($row = mysql_fetch_assoc($result)) {
						$data['UBA'][$i] = $row;
						$data['UBA'][$i]['brands'] = 0 ;
						$i++;
					}
				}
				$i = 0;
				$query = "SELECT bots.bot_id,bots.bot_name,bots.bot_network,bots.status,bots.cat_id,bots.created_on,bots.bot_last_run,bots.bot_type from bots,users where users.id=bots.masterid and users.email='".$search_token."'";
				$result = mysql_query($query);
				if($result && mysql_num_rows($result) > 0){
					while($row = mysql_fetch_assoc($result)){
						$data['BOT'][$i] = $row;
						$i++;
					}
				}
			}
		}elseif ($field == "masterid") {
			$query = "SELECT fname,lname,email,joindate,id from users where id=".$search_token;
			$result = mysql_query($query);
			if($result && mysql_num_rows($result)>0){
				$query = "SELECT users.fname,users.lname,users.email,users.joindate,users.id,brands.masterid,brands.id,brands.name,brands.pinterest,brands.facebook,brands.twitter,brands.instagram,brands.etsy,brands.plan,brands.stripe_customer,brands.stripe_subscription,brands.credits,brands.status,brands.joindate,brands.tz,brands.plan_start,brands.plan_end,plans.name as pname,plans.amount, plans.type,timezone.name as tname from users,brands,plans,timezone where brands.masterid=users.id and brands.plan=plans.id and brands.tz=timezone.id and users.id=".$search_token;
				
				if(mysql_query($query) && mysql_num_rows(mysql_query($query))>0){
					$result = mysql_query($query);
					while($row = mysql_fetch_assoc($result)){
						$data['UBA'][$i] = $row;
						$data['UBA'][$i]['brands'] = 1;
						$i++;
					}	
				}else{
					while ($row = mysql_fetch_assoc($result)) {
						$data['UBA'][$i] = $row;
						$data['UBA'][$i]['brands'] = 0 ;
						$i++;
					}
				}
				$i = 0;
				$query = "SELECT bot_id,bot_name,bot_network,status,cat_id,created_on,bot_last_run,bot_type from bots where masterid=".$search_token;
				$result = mysql_query($query);
				if($result && mysql_num_rows($result) > 0){
					while($row = mysql_fetch_assoc($result)){
						$data['BOT'][$i] = $row;
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
					$data['UBA'][$i] = $row;
					$plan_start = $row['plan_start'].' 00:00:00';
					$plan_start = date("Y-m-d H:i:s",strtotime($plan_start));
					$plan_end = $row['plan_end'].' 00:00:00';
					$plan_end = date("Y-m-d H:i:s",strtotime($plan_end));
					$query = "SELECT id from autopins where brandid=".$search_token." and datetime BETWEEN '".$plan_start."' and '".$plan_end."'";
					$result = mysql_query($query);
					if($result && mysql_num_rows($result) > 0){
						$data['POST'][$i]['autopins'] = mysql_num_rows($result);
					}else{
						$data['POST'][$i]['autopins'] = 0;
					}
					$query = "SELECT id from autopost_fb where brandid=".$search_token." and datetime BETWEEN '".$plan_start."' and '".$plan_end."'";
					$result = mysql_query($query);
					if($result && mysql_num_rows($result) > 0){
						$data['POST'][$i]['autopost_fb'] = mysql_num_rows($result);
					}else{
						$data['POST'][$i]['autopost_fb'] = 0;
					}
					$query = "SELECT id from autopost_tw where brandid=".$search_token." and datetime BETWEEN '".$plan_start."' and '".$plan_end."'";
					$result = mysql_query($query);
					if($result && mysql_num_rows($result) > 0){
						$data['POST'][$i]['autopost_tw'] = mysql_num_rows($result);
					}else{
						$data['POST'][$i]['autopost_tw'] = 0;
					}
					$query = "SELECT id from autopost_insta where brandid=".$search_token." and datetime BETWEEN '".$plan_start."' and '".$plan_end."'";
					$result = mysql_query($query);
					if($result && mysql_num_rows($result) > 0){
						$data['POST'][$i]['autopost_insta'] = mysql_num_rows($result);
					}else{
						$data['POST'][$i]['autopost_insta'] = 0;
					}
					$query = "SELECT amount,payment_type,datetime from billing_logs where brandid=".$search_token." ORDER BY datetime DESC";
					$result = mysql_query($query);
					if($result && mysql_num_rows($result) > 0){
						while ($row = mysql_fetch_assoc($result)) {
							$data['BILL'][$i] = $row;	
						}
					}
					$data['UBA'][$i]['brands'] = 1;
					$i++;
				}
			}
			$i = 0;
			$query = "SELECT bot_id,bot_name,bot_network,status,cat_id,created_on,bot_last_run,bot_type from bots where brandid=".$search_token;
			$result = mysql_query($query);
			if($result && mysql_num_rows($result) > 0){
				while($row = mysql_fetch_assoc($result)){
					$data['BOT'][$i] = $row;
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