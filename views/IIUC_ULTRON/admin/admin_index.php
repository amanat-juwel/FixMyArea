<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
require_once("../../../vendor/autoload.php");
use App\Reports\Reports;
use App\User\User;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

if (!isset($_SESSION)) session_start();
$_GLOBAL = Message::message();

 $objReports = new Reports();
 $allData = $objReports->index("obj");
 $new_reports=0;
 foreach ($allData as $oneData) {  
 $new_reports=$new_reports+1;
 }

 $objUsers = new User();
 $allData = $objUsers->index("obj");
 $new_member=0;
 foreach ($allData as $oneData) {  
 $new_member=$new_member+1;
 }
 
 $objUsers = new User();
 $allData = $objUsers->index_all("obj");
 $all_member=0;
 foreach ($allData as $oneData) {  
 $all_member=$all_member+1;
 }
 
 if (!isset($_SESSION)) session_start();
 $_GLOBAL = Message::message();

 if (isset($_SESSION['adminname'])) {
    ?>

<!DOCTYPE HTML>
<html>
<head>
<title>FixMyArea</title>
	<link href="../../../resource/css/form.css" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="../../../resource/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="../../../resource/js/jquery.min.js"></script>

<!-- start slider -->


</head>
<body>
<div class="header_bg1">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a href="../index.php">FixMyArea </a></h1>
		</div>
		<div class="h_search navbar-right">
			<form id="searchForm"  action="problems.php"  method="get">			   
               <input type="hidden" name="area" id="inlineCheckbox1" checked="" value="">                                				
               <input type="hidden" name="ward_no" id="inlineCheckbox1" checked="" value="">                                                                        
			    <input type="text" id="searchID" name="search" class="text" value="Search by Area Name or Ward No" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search by Area Name or Ward No';}">
				<input type="submit"  value="search">
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="row h_menu">
		<nav class="navbar navbar-default navbar-left" role="navigation">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="../index.php">Home</a></li>
		        <li><a href="../problems.php">View Problems</a></li>
		        <li><a href="../all_reports.php">All Reports </a></li>
		        <li><a href="../fixed_problems.php">Recently Fixed Problems</a></li>
		        <li><a href="../report_a_problem.php">Report a Problem</a></li>
				<li><a href="../profile/signup_login.php">Login as Member</a></li>				
		      </ul>
		    </div><!-- /.navbar-collapse -->
		    <!-- start soc_icons -->
		</nav>
		<div class="soc_icons navbar-right">
				
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>
<div class="main_bg">
<!-- start main -->

	<div style="margin-left: 80px;padding-bottom:0px;">
		<h1></b><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Welcome: </b><i><?php echo "Admin" ?>!</i><h1> 
		<h2><a class="btn btn-danger" href="logout.php">Log out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a><h2>
	</div>
	
<div style="margin-left: 80px;padding-top:0px;padding-bottom:10px;  margin-bottom: 200px;">
	<button type="button" class="btn btn-info" onclick="location.href='view_reports.php';" >New Reports(<?php echo $new_reports;?>)</button><br><br>
	<button type="button" class="btn btn-info" onclick="location.href='member_request.php';" >Member requests(<?php echo $new_member;?>)</button><br><br>
	<button type="button" class="btn btn-info" onclick="location.href='member_all.php';" >All members(<?php echo $all_member;?>)</button>
		
</div>



<!-- end main -->
<div class="footer_bg"><!-- start footer -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>&copy; 2014 Learner. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></span></p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php } else {
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Failed!</strong> Please Log in first.
                </div>");
    Utility::redirect('admin_login.php');
}
?>
