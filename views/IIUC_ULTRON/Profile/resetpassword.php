<?php
if (!isset($_SESSION)) session_start();
include_once('../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\Utility\Utility;

if (isset($_POST['new_password']) && isset($_POST['confirm_new_password'])) {

    if ($_POST['new_password'] == $_POST['confirm_new_password']) {

        $obj = new User();
        $_POST['password1'] = $_POST['new_password'];
        $obj->setData($_POST);
        $obj->change_password();
        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Password reset has been completed, Please login!
                </div>");
        Utility::redirect('signup_login.php');
        return;
    } else {
        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Error!</strong> Password doesn't match!
                </div>");
    }
}

if (isset($_GET['email'])) {
    $obj = new User();
    $obj->setData($_GET);
    $singleUser = $obj->view();

    if ($singleUser->user_pass != $_GET['code']) {

        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Error!</strong> Invalid Password Reset Link.
                </div>");
        Utility::redirect('signup_login.php');
        return;
    }

} else {
    Utility::redirect('signup_login.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Learner a education Category Flat bootstrap Website Template | Contact :: w3layouts</title>
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
                <h1><a href="../index.php">Learner</a></h1>
            </div>
            <div class="h_search navbar-right">
                <form>
                    <input type="text" class="text" value="Enter text here" onfocus="this.value = '';"
                           onblur="if (this.value == '') {this.value = 'Enter text here';}">
                    <input type="submit" value="search">
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
                        <li><a href="../technology.html">View Problems</a></li>
                        <li><a href="../about.html">All Reports</a></li>
                        <li><a href="../blog.html">Recently Fixed Problems</a></li>
                        <li><a href="../report_file.php">Report a Problem</a></li>
                        <!--if the user is logged in then logout will be shown otherwise login will be shown-->
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <li><a href="signup_login.php">Login</a></li>
                        <?php } else { ?>
                            <li><a href="logout.php">Log Out</a></li>
                        <?php } ?>

                        <li><a href="../blog.html">Contact Us</a></li>
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
                    <h2>Please set a new password and confirm it !</h2>
                    <form action="" method="post">
                        <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
                        <div>
                            <span><input type="password" name="new_password" placeholder="New Password"
                                         class="form-password form-control" id="pass1" required></span>
                        </div>

                        <div>
                            <span><input type="password" name="confirm_new_password" placeholder="Confirm New Password"
                                         class="form-password form-control" id="pass2"
                                         onkeyup="checkPass(); return false;" required></span>
                            <span id="confirmMessage" class="confirmMessage"></span>
                        </div>

                        <div>
                            <label class="fa-btn btn-1 btn-1e"><input type="submit" value="Submit"></label>
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
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
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


