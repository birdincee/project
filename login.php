<html lang="en">
<head>
  <title>SystemReserve</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="js/bootstrap.min.js" />
</head>
<body style="background-color:	#181818;">
<?php 
include ("navbar.php")
?>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">เข้าสู่ระบบ ก่อนใช้งาน </h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="checklogin.php" method="Post">
			    			<div class="form-group">
			    				<input type="username" name="txtUsername" id="txtUsername" class="form-control input-sm" placeholder="username">
			    			</div>

			    			<div class="form-group">
			    				<input type="password" name="txtPassword" id="txtPassword" class="form-control input-sm" placeholder="password">
			    			</div>
			    				

			    			<input type="submit" value="Login" class="btn btn-info btn-block">
			    			<a href="register.php" class="btn btn-primary btn-block" role="button">Register</a>
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>

    </body>
</html>