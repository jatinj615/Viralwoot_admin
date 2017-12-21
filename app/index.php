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
    <div class="be-wrapper be-nosidebar-left">
      <? include 'navbar.php';?>
      <div class="be-content">
        
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-xs-10 col-md-12">
              
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-sm-12" style="margin-top: 1em">
                          <div class="input-group">
                            <div class="col-xs-7">
                              <input class="form-control" type="text" id="search_token">  
                            </div>
                            
                              <div class="col-xs-5">
                              <select class="form-control" id="sel1">
                                  <option>Name</option>
                                  <option>Email</option>
                                  <option>MasterId</option>
                                  <option>BrandId</option>
                                </select>
    
                              </div>
                              <span class="input-group-btn">
                              
                                <button type="button" class="btn btn-primary" id="search">Search</button>    
                              
                            </span>
                        </div>
                    </div>
                  </div>
                </div>
              <div class="col-sm-12" id="userstable" style="display: none;">
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
            </div>
            <div class="col-sm-12" id="brandstable" style="display: none;">
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
            <div class="col-sm-12" id="accountstable" style="display: none;">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Accounts Table
                </div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>User ID</th>
                        <th>Brand ID</th>
                        <th>Pinterest</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Instagram</th>
                        <th>ETSY</th>
                      </tr>
                    </thead>
                    <tbody id="tbodyaccounts">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12" id="botstable" style="display: none;">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Bots Table
                </div>
                <div class="panel-heading pull-left" id="totalbots">
                </div>
                <div class="panel-heading pull-right" id="activebots"> 
                  
                </div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Bot Id</th>
                        <th>Bot Name</th>
                        <th>Bot Network</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Created On</th>
                        <th>Bot Last Run</th>
                        <th>Bot Type</th>
                      </tr>
                    </thead>
                    <tbody id="tbodybots">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12" id="poststable" style="display: none;">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Posts Table
                </div>
                  <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Pinterest Posts</th>
                        <th>Facebook Posts</th>
                        <th>Twitter Posts</th>
                        <th>Instagram Posts</th>
                        <th>Total Posts</th>
                      </tr>
                    </thead>
                    <tbody id="tbodyposts">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12" id="lasttransaction" style="display: none;">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Last Transaction
                </div>
                  <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Amount</th>
                        <th>Payment Type</th>
                        <th>Date Time</th>
                      </tr>
                    </thead>
                    <tbody id="tbodybill">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12" id="etsypost" style="display: none;">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Etsy Posts
                </div>
                  <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Pinterest Post</th>
                        <th>Facebook Post</th>
                        <th>Twitter Post</th>
                        <th>Instagram Post</th>
                      </tr>
                    </thead>
                    <tbody id="tbodyetsypost">
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
    </div>
    <? include 'footer.php';?>
    <script src="//cdn.viralwoot.com/v2/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.viralwoot.com/v2/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.viralwoot.com/v2/assets/js/main.js" type="text/javascript"></script>
    <script src="//cdn.viralwoot.com/v2/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdn.viralwoot.com/v2/assets/lib/prettify/prettify.js" type="text/javascript"></script>
    <script src="//cdn.viralwoot.com/v2/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="//cdn.viralwoot.com/v2/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> 
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	
      	//Runs prettify
      	prettyPrint();
        // $('#myTable').DataTable();
        $('#search').click(function(){
          $('#tbody').empty();
          $('#tbodybrands').empty();
          $('#tbodybots').empty();
          $('#tbodyaccounts').empty();
          $('#totalbots').empty();
          $('#activebots').empty();
          $('#tbodyposts').empty();
          $('#tbodybill').empty();
          $('#tbodyetsypost').empty();
          $('#userstable').css('display','none');
          $('#accountstable').css('display','none');
          $('#brandstable').css('display','none');
          $('#botstable').css('display','none');
          $('#poststable').css('display','none');
          $('#lasttransaction').css('display','none');
          $('#etsypost').css('display','none');
          var search_token = encodeURIComponent($("#search_token").val());
          var field = $('#sel1').find(":selected").text();
          
          if(search_token != null){
            $.post("api.php?search_token="+search_token+"&field="+field, function(data,status){
              //console.log(data);
              var obj = $.parseJSON(data);
              // console.log(obj);
              if(obj['UBA'] != null && obj['UBA'].length>0){
                $('#userstable').css('display','block');
                if(field != "Name"){
                  $('#tbody').html('<tr><td>'+obj['UBA'][0].id+'</td><td>'+obj['UBA'][0].fname+' '+obj['UBA'][0].lname+'</td><td>'+obj['UBA'][0].email+'</td><td>'+obj['UBA'][0].joindate+'</td></tr>');   
                }
              for (var i = 0; i < obj['UBA'].length; i++) {
                if(field == "Name"){
                  $('#tbody').append('<tr><td>'+obj['UBA'][i].id+'</td><td>'+obj['UBA'][i].fname+' '+obj['UBA'][i].lname+'</td><td>'+obj['UBA'][i].email+'</td><td>'+obj['UBA'][i].joindate+'</td></tr>');
                }
                else if (obj['UBA'][i].brands == 1) {
                  // if()
                  $('#accountstable').css('display','block');
                $('#brandstable').css('display','block');
                  $('#tbodybrands').append('<tr><td>'+obj['UBA'][i].masterid+'</td><td>'+obj['UBA'][i].id+'</td><td>'+obj['UBA'][i].name+'</td><td>'+obj['UBA'][i].pname+'</td><td>'+'$'+obj['UBA'][i].amount+'</td><td>'+obj['UBA'][i].type+'</td><td>'+obj['UBA'][i].tname+'</td><td>'+obj['UBA'][i].stripe_customer+'</td><td>'+obj['UBA'][i].stripe_subscription+'</td><td>'+obj['UBA'][i].credits+'</td><td>'+obj['UBA'][i].status+'</td><td>'+obj['UBA'][i].bjoindate+'</td><td>'+obj['UBA'][i].plan_start+'</td><td>'+obj['UBA'][i].plan_end+'</td></tr>');
                  $('#tbodyaccounts').append('<tr><td>'+obj['UBA'][i].masterid+'</td><td>'+obj['UBA'][i].id+'</td><td>'+obj['UBA'][i].pinterest+'</td><td>'+obj['UBA'][i].facebook+'</td><td>'+obj['UBA'][i].twitter+'</td><td>'+obj['UBA'][i].instagram+'</td><td>'+obj['UBA'][i].etsy+'</td></tr>');
                }
              }
              }
              if(obj['BOT'] != null && obj['BOT'].length > 0){
                $('#botstable').css('display','block');
                $('#totalbots').append('Total Bots : '+obj['BOT'].length);
                var activebots = 0;
                for(var i = 0 ; i < obj['BOT'].length; i++){
                  // console.log(obj['BOT'][i]);
                  if(obj['BOT'][i].status == 0){
                    activebots++;
                  }
                  $('#tbodybots').append('<tr><td>'+obj['BOT'][i].bot_id+'</td><td>'+obj['BOT'][i].bot_name+'</td><td>'+obj['BOT'][i].bot_network+'</td><td>'+obj['BOT'][i].status+'</td><td>'+obj['BOT'][i].cat_id+'</td><td>'+obj['BOT'][i].created_on+'</td><td>'+obj['BOT'][i].bot_last_run+'</td><td>'+obj['BOT'][i].bot_type+'</td></tr>');
                }
                $('#activebots').append('Active Bots : '+activebots);  
              }
              if(obj['POST'] != null && obj['POST'].length > 0){
                $('#poststable').css('display','block');
                for(var i = 0 ; i < obj['POST'].length ; i++){
                  var totalposts = obj['POST'][i].autopost_insta+obj['POST'][i].autopins+obj['POST'][i].autopost_fb+obj['POST'][i].autopost_tw;
                  $('#tbodyposts').append('<tr><td>'+obj['POST'][i].autopins+'</td><td>'+obj['POST'][i].autopost_fb+'</td><td>'+obj['POST'][i].autopost_tw+'</td><td>'+obj['POST'][i].autopost_insta+'</td><td>'+totalposts+'</td></tr>');
                }
              }
              if(obj['BILL'] != null && obj['BILL'].length > 0){
                $('#lasttransaction').css('display','block');
                for(var i = 0 ; i < 1 ; i++){
                  $('#tbodybill').append('<tr><td>'+obj['BILL'][i].amount+'</td><td>'+obj['BILL'][i].payment_type+'</td><td>'+obj['BILL'][i].datetime+'</td></tr>')
                }
              }
              // console.log(obj['ETSY_POST'].length);
              if(obj['ETSY_POST'] != null && obj['ETSY_POST'].length > 0){
                $('#etsypost').css('display','block');
                for(var i = 0;i < obj['ETSY_POST'].length ; i++){
                  $('#tbodyetsypost').append('<tr><td>'+obj['ETSY_POST'][0].pinterest_post+'</td><td>'+obj['ETSY_POST'][0].facebook_post+'</td><td>'+obj['ETSY_POST'][0].twitter_post+'</td><td>'+obj['ETSY_POST'][0].instagram_post+'</td></tr>');
                }
              } 
            });
          }
        });
      });
    </script>
  </body>
</html>