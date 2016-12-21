<?php
if (!isset($_SESSION)) session_start();
include_once('../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\Utility\Utility;


if (isset($_POST['email'])) {
    $obj = new User();
    $obj->setData($_POST);
    $singleUser = $obj->view();

    $passwordResetLink = $singleUser->user_pass;

    require '../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->AddAddress($_POST['email']);
    $mail->Username = "sajedayeasmin@gmail.com";     //   your gmail id here
    $mail->Password = "sajeda3310";                      //  your gmail password here
    $mail->SetFrom('sajedayeasmin@gmail.com', 'Fix My Area');
    $mail->AddReplyTo("sajedayeasmin@gmail.com", "Fix My Area");
    $mail->Subject = "Your Password Reset Link";
    $message = "Please click this link to reset your password: 
       http://localhost/FixMyArea_BITM_FINAL_PROJECT/views/IIUC_ULTRON/Profile/resetpassword.php?email=" . $_POST['email'] . "&code=" . $singleUser->user_pass;
    $mail->MsgHTML($message);
    if ($mail->Send()) {

        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Email Sent!</strong> Please check your email for password reset link.
                </div>");
    }

}
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
                        <li><a href="../all_reports.php">All Reports</a></li>
                        <li><a href="../fixed_problems.php">Recently Fixed Problems</a></li>
                        <li><a href="../report_a_problem.php">Report a Problem</a></li>
                        <!--if the user is logged in then logout will be shown otherwise login will be shown-->
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <li><a href="signup_login.php">Login</a></li>
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
                    <h2>Need help with your password? </h2>
                    <h4>Please provide us your varified email</h4>
                    <form action="" method="post">
                        <div id="frmCheckUsername">
                            <!--<span>User Email</span>-->
                            <span><input id="email" type="email" class="form-control" name="email"></span>
                            <span id="user-availability-status"></span>
                        </div>
                        <div>
                            <label class="fa-btn btn-1 btn-1e"><input type="submit"
                                                                      value="Please Email Me The Password Reset Link"></label>
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
    $('.alert').slideDown("slow").delay(10000).slideUp("slow");
</script>

<script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_user.php",
            data: 'email=' + $("#email").val(),
            type: "post",
            success: function (data) {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
</script>