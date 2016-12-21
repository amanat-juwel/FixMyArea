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
use App\Utility\Utility;
error_reporting(0);
if(!isset( $_SESSION)) session_start();
$_GLOBAL= Message::message();

if(isset($_SESSION['email']))
{
?>

    <!DOCTYPE HTML>
    <html>
    <head>
        <title>FixMyArea</title>
        <link href="../../resource/css/form.css" rel="stylesheet">
        <!-- image preview-->
        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
              rel="stylesheet" type="text/css"/>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
		<!--
		<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


input[type=submit]:hover {
    background-color: #45a049;
}


</style>
-->   
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
            function readURL_3(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah_3')
                            .attr('src', e.target.result)
                            .width(100)
                            .height(100);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
        <!--End image preview-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


        <!-- Google map-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showLocation);
                } else {
                    $('#location').html('Geolocation is not supported by this browser.');
                }
            });

            function showLocation(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                document.getElementById("mytext").value = latitude;
                document.getElementById("mytext2").value = longitude;
                $.ajax({
                    type: 'POST',
                    url: 'report_a_problem.php',
                    data: 'latitude=' + latitude + '&longitude=' + longitude,
                    success: function (msg) {
                        if (msg) {
                            $("#location").html(msg);
                        } else {
                            $("#location").html('Not Available');
                        }
                    }
                });
            }
        </script>
        <!--End Google map -->


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
                        <input type="text" id="searchID" name="search" class="text" value="Enter text here"
                               onfocus="this.value = '';"
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="problems.php">View Problems</a></li>
                            <li><a href="#">All Reports </a></li>
                            <li><a href="fixed_problems.php">Recently Fixed Problems</a></li>
                            <li class="active"><a href="report_a_problem.php">Report a Problem</a></li>
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


    <div class="main_bg"><!-- start main -->

<div class="container" style="margin-left: 65px;padding-top:0px;padding-bottom:10px;">
<h1 center> Report a Problem </h1>
<h3 center> You are logged in as: <em><?php echo $_SESSION['email']; ?></em><br><br> 
<a class="btn btn-danger" href="profile/logout.php">Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
</div>


        <!--
                    <form role="form" action="store.php" method="post" style="margin-left:15%;margin-right:15%; ">
                    <label for="fname">Title</label>
                    <input type="text" id="fname" name="title"><br>
                    <label for="lname">Author</label>
                    <input type="text" id="lname" name="author"><br>
                     <label for="lname">Area</label>
                    <input type="text" id="lname" name="area"><br>
                     <label for="lname">Ward No</label>
                    <input type="text" id="lname" name="ward_no"><br>
                     <label for="lname">Description</label>
                    <input type="text" id="lname" name="description"><br>
                     <label for="lname">Image 1</label>
                    <input type="text" id="lname" name="image_1"><br>
                     <label for="lname">Image 2</label>
                    <input type="text" id="lname" name="image_2"><br>
                     <label for="lname">Image 3</label>
                    <input type="text" id="lname" name="image_3"><br>
                     <label for="lname">Video</label>
                    <input type="text" id="lname" name="video"><br>

                    <button type="submit" class="btn btn-primary">Create</button>
                    </form> --->


        <div class="container" style="margin-left: 65px; margin-bottom:150px; padding-top:0px;padding-bottom:10px;">


            <div style="margin-left:250px;margin-right:250px;margin-top=0px;padding-top=0px;">
                <form method="post" action="store.php" autocomplete="on" name="myForm"
                      onsubmit="return checkSize(4194304)" enctype="multipart/form-data"
                ><br><br><br><br>
                    <label for="fname" class="para">Report Title</label>
                    <input type="text" id="fname" name="title" required aria-required="true">


                    <input type="hidden" id="fname" name="author" value=" ">

                    <label for="lname" class="para">Category</label>
                    <select name="category">
                        <option value="">-----Select-----</option>
                        <option value="Road">Road</option>
                        <option value="Manhole">Manhole</option>
                        <option value="Dranage system">Dranage system</option>
                        <option value="Wire">Wire</option>
                        <option value="Dustbin">Dustbin</option>
                        <option value="Dustbin">others</option>
                    </select>

                    <label for="fname" class="para">Area</label>
                    <select name="area">
                        <option value="">-----Select-----</option>
                        <option value="Agrabad">Agrabad</option>
                        <option value="GEC">GEC</option>
                        <option value="2 no gate">2 no gate</option>
                        <option value="Muradpur">Muradpur</option>
                    </select>

                    <label for="lname" class="para">Word no</label>
                    <select name="ward_no">
                        <option value="">-----Select-----</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <br><br>

                    <label for="lname" class="para">Description</label><br>
                    <textarea rows="4" cols="115" name="description" required aria-required="true">
	</textarea><br><br>

                    <!--
                    <input type="hidden" name="latitude" id="mytext">
                    <input type="hidden" name="longitude" id="mytext2"> -->

                    <label for="lname" class="para"><span
                            class="glyphicon glyphicon-camera"></span> <?php echo "&nbsp&nbsp&nbsp"; ?>Image 1
                        (required)<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></label>
                    <input type="file" name="image_1" onchange="readURL(this);" accept="image/*"><img id="blah"
                                                                                                      src="#"
                                                                                                      alt="Img Preview"/>
                    <br><br>
                    <label for="lname" class="para"><span
                            class="glyphicon glyphicon-camera"></span> <?php echo "&nbsp&nbsp&nbsp"; ?>Image
                        2 <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></label>
                    <input type="file" name="image_2" onchange="readURL_2(this);" accept="image/*"><img id="blah_2"
                                                                                                        src="#"
                                                                                                        alt="Img Preview"/>
                    <br><br>
                    <label for="lname" class="para"><span
                            class="glyphicon glyphicon-camera"></span> <?php echo "&nbsp&nbsp&nbsp"; ?>Image
                        3 <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></label>
                    <input type="file" name="image_3" onchange="readURL_3(this);" accept="image/*"><img id="blah_3"
                                                                                                        src="#"
                                                                                                        alt="Img Preview"/>
                    <br><br>
                    <label for="lname" class="para"><span
                            class="glyphicon glyphicon-film"></span><?php echo "&nbsp&nbsp&nbsp"; ?> Video(
                        max-4mb)<?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></label>
                    <input type="file" name="video" id="i_file" accept="video/*"> <br><br>

                    <br><br>
                    <label class="para">Location</label>
                    <div id="gmap" style="height: 200px"></div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">

                    <input type="submit" id="i_submit" name="submit" value="Publish Now">
                </form>
            </div>
            <script type="text/javascript">
                function checkSize(max_video_size) {
                    var input = document.getElementById("i_file");
                    // check for browser support (may need to be modified)
                    if (input.files && input.files.length == 1) {
                        if (input.files[0].size > max_video_size) {
                            alert("The file must be less than " + (max_video_size / 1024 / 1024) + "MB");
                            return false;
                        }
                    }

                    return true;
                }
            </script>

            <br><br>


            <div id="display-success"><?php if (isset($_GLOBAL)) echo $_GLOBAL; ?></div>
            <script>
                $('#display-success').show().delay(10).fadeOut();
                $('#display-success').show().delay(10).fadeIn();
                $('#display-success').show().delay(10).fadeOut();
                $('#display-success').show().delay(10).fadeIn();
                $('#display-success').show().delay(1200).fadeOut();
            </script>
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

        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1N26rn3RBHu1dZrNFijhfIgLo7FRW4qc&libraries=places&callback=initAutocomplete"
            async defer></script>


        <script>
            /*$('#i_submit').click(function (event) {
                console.log($('#latitude').val());
                console.log($('#longitude').val());
            });*/

            function initAutocomplete() {
                var myLatlng = new google.maps.LatLng(22.3475, 91.8123);
                var mapProp = {
                    center: myLatlng,
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP

                };
                var map = new google.maps.Map(document.getElementById("gmap"), mapProp);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    draggable: true
                });
                document.getElementById('latitude').value = 22.3475;
                document.getElementById('longitude').value = 91.8123;
                // marker drag event
                google.maps.event.addListener(marker, 'drag', function (event) {
                    document.getElementById('latitude').value = event.latLng.lat();
                    document.getElementById('longitude').value = event.latLng.lng();
                });

                //marker drag event end
                google.maps.event.addListener(marker, 'dragend', function (event) {
                    document.getElementById('latitude').value = event.latLng.lat();
                    document.getElementById('longitude').value = event.latLng.lng();
                });
            }
        </script>


    </body>
    </html>
<?php } else {
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Reporting Failed!</strong> Please Log in first.
                </div>");
    Utility::redirect('Profile/signup_login.php');
}
?>