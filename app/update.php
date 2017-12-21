<?php
	$token = $_GET['token'];
	$field = $_GET['field'];
	$brandid = $_GET['brandid'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="//cdn.viralwoot.com/v2/assets/img/logo-fav.png">
    <link rel="stylesheet" type="text/css" href="//cdn.viralwoot.com/v2/assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
    <title>Viralwoot</title>
    <link rel="stylesheet" type="text/css" href="//cdn.viralwoot.com/v2/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.viralwoot.com/v2/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.viralwoot.com/v2/assets/css/style.css" type="text/css"/>
      </head>
  <body>
        
    <div class="main-content container-fluid">
      <div class="row">
        <div class="col-md-12">
        	<div class="panel panel-default">
        	  <div class="panel-body">
        	  	<div class="panel-heading text-center" id="heading">Loading....</div>
		<div class="col-sm-12" id="userstable">
        <div class="panel panel-default panel-table">
            <div class="panel-heading">Users Table
              
            </div>
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width:10%;">ID</th>
                    <th style="width:30%;">Name</th>
                    <th style="width:30%;">Email</th>
                    <th>Join Date</th>
                   
                  </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-sm-12" id="brandstable">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">Brands Table
                
              </div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Brand ID</th>
                      <th>Name</th>
                      <th>Plan</th>
                      <th>Plan Amount</th>
                      <th>Plan Type</th>
                      <th>Time Zone</th>
                      <th>Stripe Customer</th>
                      <th>Stripe Subscription</th>
                      <th>Credit</th>
                      <th>Status</th>
                      <th>Join Date</th>
                      <th>Plan Start</th>
                      <th>Plan End</th>
                    </tr>
                  </thead>
                  <tbody id="tbodybrands">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
	</div>
      </div>
    </div>
	<script src="//cdn.viralwoot.com/v2/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/js/main.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/prettify/prettify.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$.post('../api/updateBrand.php?token=<?php echo $brandid?>', function(data,status){
				obj = $.parseJSON(data);
				var i = 0;
				$('#tbody').html('<tr><td>'+obj['UBA'][0].masterid+'</td><td>'+obj['UBA'][0].fname+' '+obj['UBA'][0].lname+'</td><td>'+obj['UBA'][0].email+'</td><td>'+obj['UBA'][0].joindate+'</td></tr>');
				$('#tbodybrands').append('<tr><td>'+obj['UBA'][i].masterid+'</td><td>'+obj['UBA'][i].id+'</td><td>'+obj['UBA'][i].name+'</td><td>'+obj['UBA'][i].pname+'</td><td>'+'$'+obj['UBA'][i].amount+'</td><td>'+obj['UBA'][i].type+'</td><td>'+obj['UBA'][i].tname+'</td><td>'+obj['UBA'][i].stripe_customer+'</td><td>'+obj['UBA'][i].stripe_subscription+'</td><td>'+obj['UBA'][i].credits+'</td><td>'+obj['UBA'][i].status+'</td><td>'+obj['UBA'][i].bjoindate+'</td><td>'+obj['UBA'][i].plan_start+'</td><td>'+obj['UBA'][i].plan_end+'</td></tr>');
				$('#heading').empty();
			});
		});

	</script>
</body>
</html>