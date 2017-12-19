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
            <div class="col-xs-8 col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                  <div class="col-sm-11">
                        <div class="input-group form-inline">
                          <div class="col-xs-7">
                            <input class="form-control" type="text" id="search_token">  
                          </div>
                          
                            <div class="col-xs-5">
                            <select class="form-control" id="sel1">
                                <option>Name</option>
                                <option>Email</option>
                                <option>MasterId</option>
                                <option>Brand Id</option>
                              </select>
  
                            </div>
                            <span class="input-group-btn">
                            
                              <button type="button" class="btn btn-primary" id="search">Search</button>    
                            
                          </span>
                      </div>
                  </div>
                  <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">User Tables
                  
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
          var search_token = encodeURIComponent($("#search_token").val());
          var field = $('#sel1').find(":selected").text();
          
          if(search_token != null){
            $.post("api.php?search_token="+search_token+"&field="+field, function(data,status){
              var obj = $.parseJSON(data);
              if(obj != null && obj.length>0){
              for (var i = 0; i < obj.length; i++) {
                console.log(obj);
                // $('#tbody').append('<tr><td>'+obj[i].id+'</td><td>'+obj[i].fname+' '+obj[i].lname+'</td><td>'+obj[i].email+'</td><td>'+obj[i].joindate+'</td></tr>');
              }  
              }
              
            });
          }
        });
      });
    </script>
  </body>
</html>