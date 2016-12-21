<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
require_once("../../vendor/autoload.php");
use App\Reports\Reports;
use App\Message\Message;

if (!isset($_SESSION)) session_start();
$_GLOBAL = Message::message();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>FixMyArea</title>
    <link href="../../resource/css/form.css" rel="stylesheet">

    <script type="text/javascript">
        if (screen.width <= 699) {
            document.location = "single_view_m.php";
        }
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


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
    <link href="../../resource/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- start plugins -->
    <script type="text/javascript" src="../../resource/js/jquery.min.js"></script>

    <!-- start slider -->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <!-- Scroll to top-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow7.js"></script>
    <noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more
        info.
    </noscript>
    <!-- Scroll to top End-->
	
	<!--Facebook share -->
    <meta property="og:url"           content="http://localhost/FixMyArea_BITM_FINAL_PROJECT/views/IIUC_ULTRON/index.php" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="FixMyArea" />
	<meta property="og:description"   content="description" />
	<meta property="og:image"         content="" />
<!--Facebook share -->


</head>
<body>
<div class="header_bg1">
    <div class="container">
        <div class="row header">
            <div class="logo navbar-left">
                <h1><a href="index.php">FixMyArea </a></h1>
            </div>
            <div class="h_search navbar-right">
                <form id="searchForm" action="problems.php" method="get">
                    <input type="hidden" name="area" id="inlineCheckbox1" checked="" value="">
                    <input type="hidden" name="ward_no" id="inlineCheckbox1" checked="" value="">
                    <input type="text" id="searchID" name="search" class="text" value="Search by Area Name or Ward No"
                           onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search by Area Name or Ward No';}">
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
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="problems.php">View Problems</a></li>
                        <li><a href="all_reports.php">All Reports </a></li>
                        <li><a href="fixed_problems.php">Recently Fixed Problems</a></li>
                        <li><a href="report_a_problem.php">Report a Problem</a></li>
                        <!--if the user is logged in then logout will be shown otherwise login will be shown-->
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <li><a href="profile/signup_login.php">Login</a></li>
                            <li><a href="#">Contact Us</a></li>
                        <?php } else { ?>
                            <li><a href="profile/profile.php">Profile</a></li>
                            <li><a href="profile/logout.php">Log Out</a></li>
                        <?php } ?>
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
<div class="main_bg"><!-- start main -->

    <!---->
    <?php

    $objReports = new Reports();
    $objReports->setData($_GET);
    $oneData = $objReports->view("obj");

    ?>
    <div style="margin-left:10%;margin-bottom:20%; display: inline-block;">
        <h3 style="color: #ed2323"><?php echo $oneData->title;; ?></h3>

        <p class="para" align="left">Reported by&nbsp;<b><?php echo $oneData->author; ?></b>
            at&nbsp;<b><?php echo $oneData->date; ?></b></p>
        <p class="para" align="left">Area:&nbsp;&nbsp;<b><?php echo $oneData->area; ?></b>, Word
            no:&nbsp;&nbsp;<b><?php echo $oneData->ward_no; ?></b></p>
        <p class="para" align="left">Category:&nbsp;&nbsp;<b><?php echo $oneData->category; ?></b></p>

        <h3 style="color: #ed2323">Images</h3>

        <div class="w3-content w3-display-container">
            <img class="mySlides" src="../../resource/images/images/<?php echo $oneData->image_1; ?>"
                 style="height:300px;width:700px">
            <img class="mySlides" src="../../resource/images/images/<?php echo $oneData->image_2; ?>"
                 style="height:300px;width:700px">
            <img class="mySlides" src="../../resource/images/images/<?php echo $oneData->image_3; ?>"
                 style="height:300px;width:700px">

            <a class="w3-btn-floating w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
            <a class="w3-btn-floating w3-display-right" onclick="plusDivs(1)">&#10095;</a>
        </div>


        <?php if (!empty($oneData->video)) { ?>
            <h3 style="color: #ed2323">Video</h3>

            <video align="center" width="700px" controls>
                <source src="../../resource/images/images/<?php echo $oneData->video; ?>" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        <?php } ?>

        <br>
	<!-- Facebook share -->
	<!-- Load Facebook SDK for JavaScript -->
   <div id="fb-root"></div>
   <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

	<!-- Your share button code -->
	<div  style="float:right" class="fb-share-button" data-href="http://localhost/FixMyArea_BITM_FINAL_PROJECT/views/IIUC_ULTRON/single_view.php?id=<?php echo $oneData->id; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FFixMyArea_BITM_FINAL_PROJECT%2Fviews%2FIIUC_ULTRON%2Fsingle_view.php%3Fid%3D<?php echo $oneData->id; ?>&amp;src=sdkpreparse">Share</a></div>
	<!-- Facebook share -->
	
        <h3><b style="color: #ed2323">Admin Feedback:&nbsp;&nbsp;</b><?php echo $oneData->admin_feedback; ?></h3><br>
		
		<h3><b style="color: #ed2323">Location Map :&nbsp;&nbsp;</b></h3><br>
        <div id="map"></div>

    </div>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>

    <!---->


    <!--============Start of comments=========== -->
    <div style="display: inline-block; float:right; margin-right:10%">
        <h3 style="color: #4CAF50;"> Comments Section: </h3>

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div style="" class="fb-comments" data-href="http://localhost/fixmyarea/docs/plugins/comments#configurator"
             data-width="25%" data-numposts="5"></div>
    </div>
    <!--============End of comments=========== -->

</div><!-- end main -->
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


<script>
    function initMap() {
        var location = {lat: <?php echo $oneData->latitude; ?>, lng: <?php echo $oneData->longitude; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1N26rn3RBHu1dZrNFijhfIgLo7FRW4qc&callback=initMap">
</script>
</body>
</html>
