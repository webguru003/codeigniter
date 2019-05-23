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
<style>
.alert-red-error {
    background-color: #fc5d61 !important;
    border: 1px solid #fc5d61 !important;
    color: #FFFFFF;
}
</style>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.html"> To do list </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class=""> <a href="/to-do-list2/index.php/register" class=""> Don't have an account? </a> </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
      
    </div>
    <!-- /container --> 
    
  </div>
  <!-- /navbar-inner --> 
  
</div>
<!-- /navbar -->

<div class="account-container">
  <div class="content clearfix">
    <?php if(isset($msg)) { ?>
    <div class="alert " >
      <button type="button" class="close" data-dismiss="alert">×</button>
      <?php echo $msg; ?></div>
      <?php } ?>
    <form action="/to-do-list2/index.php/login/checkauth" method="post" id="loginf" name="loginf">
      <h1>Member Login</h1>
      <div class="login-fields">
        <p>Please provide your details</p>
        <div class="field">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
        </div>
        <!-- /field -->
        
        <div class="field">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
        </div>
        <!-- /password --> 
        
      </div>
      <!-- /login-fields -->
      
      <div class="login-actions"> <span class="login-checkbox"> </span>
        <button type="submit" class="button btn btn-success btn-large">Sign In</button>
      </div>
      <!-- .actions -->
      
    </form>
  </div>
  <!-- /content --> 
  
</div>
<!-- /account-container --> 

<script src="/to-do-list2/js/jquery-1.7.2.min.js"></script> 
<script src="/to-do-list2/js/bootstrap.js"></script> 
<script src="/to-do-list2/js/signin.js"></script>
</body>
</html>
</html>
