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
        	  	<div class="panel-heading text-center" id="heading"></div>
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
          <div class="col-sm-12">
          	<button class="btn btn-primary" data-toggle="modal" data-target="#md-credits" type="button">Change Credits</button>
          	<button class="btn btn-primary" data-toggle="modal" data-target="#md-plans" type="button">Change Plan</button>
          	<button class="btn btn-danger" data-toggle="modal" data-target="#md-remove" type="button">Remove Brand</button>
          	<a href="index.php?search_token=<?php echo $token?>&field=<?php echo $field?>" class="btn btn-primary pull-right">Back</a>	
          </div>
        </div>
        </div>
    </div>
	</div>
      </div>
    </div>
<div id="md-credits" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <h3>Update Credits</h3>
              <input type="text" name="updateCredit" id="credits"><br><br><br>
              <div>
              	
              
              <div role="alert" id="notifSuccess" class="alert alert-success alert-icon alert-icon-border alert-dismissible" style="display: none;">
                                  <div class="icon"><span class="mdi mdi-check"></span></div>
                                  <div class="message">
                                   <strong>Success!</strong> User Information Updated...
                                  </div>
                                </div>
              <div role="alert" id="notifFail" class="alert alert-warning alert-icon alert-icon-border alert-dismissible" style="display: none">
                                  <div class="icon" id="notifImage"><span class="mdi mdi-alert-triangle"></span></div>
                                  <div class="message">
                                    <strong>Failed..</strong> Nothing to Update..!
                                  </div>
                                </div>
				</div>
              <div class="xs-mt-50"> 
				
              	<button id="creditsUpdate" type="button" class="btn btn-space btn-primary">Update</button>
                <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <div id="md-plans" tabindex="-1" role="dialog" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
              </div>
              <div class="modal-body">
                <div class="text-center">
                  <h3>Update Plan</h3><br>
                  <div>
                    <b>Current Plan :</b><p id="currentPlan"></p> 
                  </div>
                  <div class="xs-mt-50">
    				        
                  	<button id="planUpdate" type="button" data-dismiss="modal" class="btn btn-space btn-primary">Update</button>
                    <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                  </div>
                </div>
              </div>
              <div class="modal-footer"></div>
            </div>
          </div>
        </div>
        <div id="md-remove" tabindex="-1" role="dialog" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                  </div>
                  <div class="modal-body">
                    <div class="text-center">
                      <h3>Are You Sure ??</h3>
                      
                      <div class="xs-mt-50"> 
        				
                      	<button id="removeBrand" type="button" data-dismiss="modal" class="btn btn-space btn-danger">Confirm</button>
                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer"></div>
                </div>
              </div>
            </div>
   <div class="modal-overlay"></div> 


	<script src="//cdn.viralwoot.com/v2/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/js/main.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/prettify/prettify.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="//cdn.viralwoot.com/v2/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			App.init();
			userDetails(<?php echo $brandid?>);
			// console.log(obj);
			var oldCredits = $('#credits').val();
			// console.log(oldCredits);
			$('#creditsUpdate').click(function(){
				// console.log(oldCredits);
					var newCredits = $('#credits').val();
					// console.log(newCredits);
					if(newCredits != oldCredits){

							// console.log("works");
						$.post('../api/updateCredits.php?token=<?php echo $brandid?>&credits='+newCredits,function(data,status){
							// console.log(data);
							if (data == "Success") {
								userDetails(<?php echo $brandid?>);
								$('#notifFail').css('display','none');
								$('#notifSuccess').css('display','');
								
							}else{
								alert("Something Went Wrong..");
							}

						});
					}else{
						$('#notifFail').css('display','');
						$('#notifSuccess').css('display','none');
					}
				});
			$('#removeBrand').click(function(){
				$.post('../api/removeBrand.php?token=<?php echo $brandid?>',function(data,status){
					if(data == "Success"){
						<?php header("Location: index.php?search_token=$token&field=$field");?>
					}else{
						alert("Something Went Wrong..");
					}
				});
			});
      $('#planUpdate').click(function(){
        $.post('../api/p')
      });
			});
		// $("#modalbtn").on("click",function(){
		// 	$("#md-default").modal({backdrop:'static'});
		// 	$("#modal-upgrade-warning").modal('show');
		// })
		function userDetails(token){
			var obj;
				$('#heading').html('Loading...');
				$('#tbody').empty();
				$('#tbodybrands').empty();
			$.post('../api/updateBrand.php?token='+token, function(data,status){
				
				this.obj = $.parseJSON(data);
				var i = 0;
				$('#tbody').html('<tr><td>'+this.obj['UBA'][0].masterid+'</td><td>'+this.obj['UBA'][0].fname+' '+this.obj['UBA'][0].lname+'</td><td>'+this.obj['UBA'][0].email+'</td><td>'+this.obj['UBA'][0].joindate+'</td></tr>');
				$('#tbodybrands').html('<tr><td>'+this.obj['UBA'][i].masterid+'</td><td>'+this.obj['UBA'][i].id+'</td><td>'+this.obj['UBA'][i].name+'</td><td>'+this.obj['UBA'][i].pname+'</td><td>'+'$'+this.obj['UBA'][i].amount+'</td><td>'+this.obj['UBA'][i].type+'</td><td>'+this.obj['UBA'][i].tname+'</td><td>'+this.obj['UBA'][i].stripe_customer+'</td><td>'+this.obj['UBA'][i].stripe_subscription+'</td><td id="oldCredits">'+this.obj['UBA'][i].credits+'</td><td>'+this.obj['UBA'][i].status+'</td><td>'+this.obj['UBA'][i].bjoindate+'</td><td>'+this.obj['UBA'][i].plan_start+'</td><td>'+this.obj['UBA'][i].plan_end+'</td></tr>');
				$('#heading').empty();
				// console.log(this.obj['UBA'][i].credits);
				$('#credits').val(this.obj['UBA'][i].credits);
				// console.log(this.obj);
        $('#currentPlan').html(this.obj['UBA'][i].pname+' $'+this.obj['UBA'][i].amount+' '+this.obj['UBA'][i].type);
        for( i = 0 ; i < this.obj['PLANS'].length ; i++){

        }
				});
			

		}
	</script>
</body>
</html>