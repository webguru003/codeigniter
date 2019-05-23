<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard - To do list</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="/to-do-list2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/to-do-list2/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="/to-do-list2/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="/to-do-list2/css/style.css" rel="stylesheet" type="text/css">
<link href="/to-do-list2/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand"  >
				To do list			
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="/to-do-list2/index.php/login" class="">
							Go to Sign in page
						</a>
						
					</li>
					
					 
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container register">
	
	<div class="content clearfix">
		<?php if(isset($msg)) { ?>
    <div class="alert alert-red-error" >
      <button type="button" class="close" data-dismiss="alert">×</button>
      <?php echo $msg; ?></div>
      <?php } ?>
		<form action="/to-do-list2/index.php/register/checkreg" method="post">
		
			<h1>Signup Account</h1>			
			
			<div class="login-fields">
				
				<p>Create your account:</p>
				
				<div class="field">
					<label for="firstname">Username:</label>
					<input type="text" id="firstname" name="firstname" value="" placeholder="First Name" class="login">
				</div>  
				
				<div class="field" style="display:none;">
					<label for="lastname">Last Name:</label>	
					<input type="text" id="lastname" name="lastname" value="" placeholder="Last Name" class="login">
				</div>  
				
				
				<div class="field">
					<label for="email">Email Address:</label>
					<input type="text" id="email" name="email" value="" placeholder="Email" class="login">
				</div>  
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login">
				</div>  
				
				 
				
			</div>  
			
			<div class="login-actions">
				
				 
									
				<button class="button btn btn-primary btn-large">Register</button>
				
			</div>  
			
		</form>
		
	</div>  
	
</div>  



 

<script src="/to-do-list2/js/jquery-1.7.2.min.js"></script>
<script src="/to-do-list2/js/bootstrap.js"></script>

<script src="/to-do-list2/js/signin.js"></script>

</body>
</html>
</html>