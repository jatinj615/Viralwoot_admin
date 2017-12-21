<?php
	include '../d/db.php';
	$brandid = mysql_escape_string($_GET['token']);
	$connect = new DatabaseConnect();
	$db = $connect->connect();
	if($db){
		$query = "SELECT users.fname,users.lname,users.email,users.joindate,users.id,brands.masterid,brands.id,brands.name,brands.pinterest,brands.facebook,brands.twitter,brands.instagram,brands.etsy,brands.plan,brands.stripe_customer,brands.stripe_subscription,brands.credits,brands.status,brands.joindate as bjoindate,brands.tz,brands.plan_start,brands.plan_end,plans.name as pname,plans.amount, plans.type,timezone.name as tname from users,brands,plans,timezone where brands.masterid=users.id and brands.plan=plans.id and brands.tz=timezone.id and brands.id=".$brandid;
		$result = mysql_query($query);
		$i = 0;
		if($result && mysql_num_rows($result) > 0){
			$row = mysql_fetch_assoc($result);
			$data['UBA'][$i] = $row;
		}
		echo json_encode($data);
	}	
?>