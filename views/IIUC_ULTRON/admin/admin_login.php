<?php
include_once('../../../vendor/autoload.php');
use App\Admin\Auth;
use App\Utility\Utility;
use App\Message\Message;

if (!isset($_SESSION)) session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>FixMyArea</title>
    <!-- Bootstrap -->
    <link href="../../../resource/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../../../resource/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- start plugins -->
    <script type="text/javascript" src="../../../resource/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../resource/js/bootstrap.js"></script>
    <!----font-Awesome----->
    <link rel="stylesheet" href="../../../resource/fonts/css/font-awesome.min.css">
    <!----font-Awesome----->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet'
          type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<div class="header_bg1">
    <div class="container">
        <div class="row header">
            <div class="logo navbar-left">
                <h1><a href="../index.php">FixMyArea</a></h1>
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
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
		        <li><a href="#">All Reports </a></li>
		        <li><a href="../fixed_problems.php">Recently Fixed Problems</a></li>
		        <li><a href="../report_a_problem.php">Report a Problem</a></li>
				<?php if (!isset($_SESSION['email'])) { ?>
                            <li class="active"><a href="signup_login.php">Login</a></li>
							<li><a href="#">Contact Us</a></li>
                        <?php } else { ?>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        <?php } ?>
		      </ul>
                </div><!-- /.navbar-collapse -->
                <!-- start soc_icons -->
            </nav>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="main_btm"><!-- start main_btm -->
    <div class="container">


        <?php if (isset($_SESSION['message'])) if ($_SESSION['message'] != "") { ?>

            <div id="message" class="form button" style="font-size: smaller  ">
                <center>
                    <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
                        echo "&nbsp;" . Message::message();
                    }
                    Message::message(NULL);
                    ?></center>
            </div>
        <?php } ?>


        <div class="main row">
            <div class="col-md-6">
                <div class="contact-form">
                    <h2>Log In </h2>
                    <form action="login.php" method="post" enctype="multipart/form-data">
                        <div>
                            <span>Admin Name</span>
                            <span><input type="text" class="form-control" name="adminname" placeholder="Admin Name"></span>
                        </div>
                        <div>
                            <span>Password</span>
                            <span><input type="password" class="form-control" name="adminpass"
                                         placeholder="Password"></span>
                        </div>
                        <div>
                            <label class="fa-btn btn-1 btn-1e"><input type="submit" value="submit us"></label>
                        </div>
                    </form>
                    <a href="forgotten.php">
                        <h4>Forgot Password?<h4>
                    </a>
                </div>
            </div>
           
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="footer_bg"><!-- start footer -->
    <div class="container">
        <div class="row  footer">
            <div class="copy text-center">
                <p class="link"><span>&copy; 2014 Learner. All rights reserved | Design by <a
                            href="http://w3layouts.com/">W3layouts</a></span></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>

