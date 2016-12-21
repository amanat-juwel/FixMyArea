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
	<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}

@keyframes zoom {
    from {transform: scale(0.1)} 
    to {transform: scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
	</style>
		<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td ,tr{
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #000711;
    color: white;
}
</style>

</head>
<body>
<div class="header_bg1">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a href="../index.php">FixMyArea </a></h1>
		</div>
		<div class="h_search navbar-right">
			<form id="searchForm"  action="../problems.php"  method="get">			   
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

<h2 style="text-align:center">All Members</h2>
<div style="margin-left: 8% ;margin-right: 8%;margin-top:2%;margin-bottom:10%; width: 1100px;">
<table> 
	
	
	<tr >
		<th>Id</th>
		<th>Name</th>
		<th>Image</th>
		<th>NID</th>
		<th>Address</th>		
		<th>email</th>
		<th>Mobile</th>
		<th>Approval</th>
		
	</tr>

<?php 
            $objUsers = new User();
            $allData = $objUsers->index_all("obj");
			foreach ($allData as $oneData) { ?>
       <tr>
		<td style="text-align:center"><?php echo $oneData->user_id; ?></td>
		<td style="text-align:center"><?php echo $oneData->user_name; ?></td>
		<td style="text-align:center"><img src="../../../resource/Picture/<?php echo $oneData->userimage; ?>" width="100" height="100"></td>
		<td style="text-align:center"><img src="../../../resource/Picture/<?php echo $oneData->nidimage; ?>" width="100" height="100"></td>		
		<td><?php echo $oneData->adress; ?></td>
		<td><?php echo $oneData->email; ?></td>
		<td><?php echo $oneData->user_mobile; ?></td>
		<td>
		<a href="member_delete.php?user_id=<?php echo $oneData->user_id ?>" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-danger" role="button"><span class="glyphicon glyphicon - trash"></span> Remove</a>
        </td> 
		
		
	</tr>

<?php } ?>
<table> 
<br><br>
<a href="admin_index.php?" class="btn btn-primary" role="button">Back to index</a>
        
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
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">×</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<style>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</style>
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
