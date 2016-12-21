<?php
include_once('../../../vendor/autoload.php');
use App\User\User;
use App\User\Auth;
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
	<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    function readURL_2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah_2')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }	
	</script>	
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
		        <li><a href="../all_reports.php">All Reports </a></li>
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
                            <span>User Email</span>
                            <span><input type="text" class="form-control" name="email" placeholder="User Email"></span>
                        </div>
                        <div>
                            <span>Password</span>
                            <span><input type="password" class="form-control" name="password1"
                                         placeholder="Password"></span>
                        </div>
                        <div>
                            <label class="fa-btn btn-1 btn-1e"><input type="submit" value="Sign in"></label>
                        </div>
                    </form>
                    <a href="forgotten.php">
                        <h4>Forgot Password?<h4>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <h2>Sign Up</h2>
                    <form action="registration.php" method="post" enctype="multipart/form-data" id="uploadimage">
                        <div>
                            <span>User Name</span>
                            <span><input type="text" class="form-control" name="userName" id="userName" required></span>
                        </div>
                        <div>
                            <span>NID</span>
                            <span><input type="number" class="form-control" name="nid" required></span>
                        </div>
                        <div>
                            <span>Present Address</span>
                            <span><input type="text" class="form-control" name="address" required></span>
                        </div>
                        <div>
                            <span>Ward No</span>
                            <span><select class="form-control" name="ward_no" required>
                                <option>Select a ward no...</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                            </select>
                            </span>
                        </div>
                        <div>
                            <span>Post Office</span>
                            <span><input type="text" class="form-control" name="post_office" required></span>
                        </div>
                        <div>
                            <span>Thana</span>
                            <span><input type="text" class="form-control" name="thana" required></span>
                        </div>
                        <div>
                            <span>District</span>
                            <span><select class="form-control" name="district" required>
                                <option>Select a district...</option>
                                <option value="Dhaka">Dhaka</option>
								<option value="Chittagong">Chittagong</option>
								<option value="Sylhet">Sylhet</option>
								<option value="Khulna">Khulna</option>
								<option value="Barishal">Barishal</option>
					            </select>
                            </span>
                        </div>
                        <div>
                            <span>Email</span>
                            <span><input type="email" class="form-control" name="email" required></span>
                        </div>
                        <div>
                            <span>Mobile</span>
                            <span><input type="text" class="form-control" name="mobile" required></span>
                        </div>
                        <div>
                            <span>Gender</span>
                            <span>
                                <div class="radio">
                                  <label><input type="radio" name="gender" value="male" required>Male</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="gender" value="female" required>Female</label>
                                </div>
                            </span>
                        </div>
                        <div>
                            <span>Occupation</span>
                            <span><select class="form-control" name="occupation" required>
                                <option>Select an Occupation...</option>
                                <option>Businessman</option>
                                <option>Student</option>
                                <option>Service holder</option>
                                <option>Housewife</option>
                                <option>Others</option>                               
					            </select></span>
                        </div>
                        <div>
                            <span>Password</span>
                            <span><input type="password" class="form-control" name="password1" id="pass1"
                                         required></span>
                        </div>
                        <div>
                            <span>Retype password</span>
                            <span><input type="password" class="form-control" name="password2" id="pass2"
                                         onkeyup="checkPass(); return false;" required></span>
                            <span id="confirmMessage" class="confirmMessage"></span>
                        </div>
                        <div>
                            <span>User Image</span>
                            <span><input type="file" onchange="readURL(this);" class="form-control" name="user_image" required><img id="blah" src="#" alt="Img Preview" /></span>
                        </div>
                        <div>
                            <span>NID image</span>
                            <span><input type="file" onchange="readURL_2(this);" class="form-control" name="user_nid_image" required> <img id="blah_2" src="#" alt="Img Preview" /></span>
                        </div>
                        <div>
                            <label class="fa-btn btn-1 btn-1e"><input type="submit" value="Sign up"></label>
                        </div>
                    </form>
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
<script>

    function checkPass() {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field
        //and the confirmation field
        if (pass1.value == pass2.value) {
            //The passwords match.
            //Set the color to the good color and inform
            //the user that they have entered the correct password
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
        } else {
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!"
        }
    }

</script>
