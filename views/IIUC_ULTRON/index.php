<?php
require_once("../../vendor/autoload.php");
use App\Message\Message;
use App\Reports\Reports;
if (!isset($_SESSION)) session_start();
$_GLOBAL = Message::message();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>FixMyArea::HOME</title>
<!-- Bootstrap -->
<link href="../../resource/css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="../../resource/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="../../resource/js/jquery.min.js"></script>
<script type="text/javascript" src="../../resource/js/bootstrap.js"></script>
<!-- start slider -->
<!-- Owl Carousel Assets -->
<link href="../../resource/css/owl.carousel.css" rel="stylesheet">
<script src="../../resource/js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {

				$("#owl-demo").owlCarousel({
					items : 4,
					lazyLoad : true,
					autoPlay : true,
					navigation : true,
					navigationText : ["", ""],
					rewindNav : false,
					scrollPerPage : false,
					pagination : false,
					paginationNumbers : false,
				});

			});
		</script>
		<!-- //Owl Carousel Assets -->
<!----font-Awesome----->
   	<link rel="stylesheet" href="../../resource/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<link rel="stylesheet" href="../../resource/css/flexslider.css" type="text/css" media="screen" />


</head>
<body>
<div class="header_bg">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a href="index.php">Fix My Area</a></h1>
		</div>
		<div class="h_search navbar-right">
			<form>
				<input type="text" class="text" value="Search by Area Name or Ward No" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search by Area Name or Ward No';}">
				<input type="submit" value="search">
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="container">
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
		        <li class="active"><a href="index.php">Home</a></li>
		        <li><a href="problems.php">View Problems</a></li>
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
		<!--	<ul class="list-unstyled text-center">
				
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube"></i></a></li>
				
			</ul>	-->
		</div>
	</div>
</div>
<!-- start slider -->
		<div class="slider_bg">
	<div class="container">
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<div class="banner-info">
							<div class="banner-info text-left">
								<div class="slider_caption">
									<h2>Welcome to the Community</h2>

									<h3>How to report a problem</h3>
									<h3> 1. Sign in with your username & password</h3>
									<h3> 2. Locate the problem by entering a nearby postcode or street name</h3>
									<h3> 3. Enter details of the problem</h3>
									<h3> 4. We send it to the council on your behalf</h3>

									<h3 class="da-link"><a href="submit.php" class="fa-btn btn-1 btn-1e">Report a problem</a></h3>
								</div>
							</div>
							<div class="clearfix"></div>
					</li>
					<li>
						<div class="banner-info">
							<div class="banner-info text-left">
								<h2>How to report a problem</h2>
								<h3>5.Enter a nearby city postcode, or street name and area</h3>
								<h3>6.Locate the problem on a map of the area</h3>
								<h3>7.Enter details of the problem</h3>
								<h3>8.We send it to the council on your behalf</h3>
								<h3 class="da-link"><a href="submit.php" class="fa-btn btn-1 btn-1e">Report a problem</a></h3>
							</div>
						</div>
						<div class="clearfix"></div>
					</li>
					<li>
						<div class="banner-info">
							<div class="banner-info text-left">
								<h2>How does it work?</h2>
								<h3>We give you the tools to report a local problem to the correct department of the local authority in charge. All reports and updates are posted online so that other people living in the area can view and support them.</h3>
								<h3 class="da-link"><a href="submit.php" class="fa-btn btn-1 btn-1e">Report a problem</a></h3>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</section>

	</div>
</div>
					<!--FlexSlider-->
				
				<script defer src="../../resource/js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(function(){
				  SyntaxHighlighter.all();
				});
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
		<!--End-slider-script-->
<!-- end slider -->
<?php 	

    $new_reports=0;$fixed_reports=0;$old_reports=0;$total_reports=0;
	
	$objReports = new Reports();
    $allData_new = $objReports->all_reports_new_for_index("obj");
    foreach ($allData_new as $oneData) {  
    $new_reports=$new_reports+1;
    }
	
	$objReports = new Reports();
    $allData_old = $objReports->all_reports_old_for_index("obj");
    foreach ($allData_old as $oneData) {  
    $old_reports=$old_reports+1;
    }
	
	$objReports = new Reports();
    $allData_fixed = $objReports->all_reports_fixed_for_index("obj");
    foreach ($allData_fixed as $oneData) {  
    $fixed_reports=$fixed_reports+1;
    }
	
	$objReports = new Reports();
    $allData_fixed = $objReports->all_reports_total_for_index("obj");
    foreach ($allData_fixed as $oneData) {  
    $total_reports=$total_reports+1;
    }
	?>
<div class="main_bg"><!-- start main -->
    <div class="container">
        <div class="main row">
            <div class="col-md-3 images_1_of_4 text-center">
                <span class="bg"><i class="fa fa-envelope"></i></span>
                <h4><a href="problems.php"><em style="color:red"><?php echo $new_reports ; ?></em> New Reports</a></h4>

                <p class="para">New reports including reports in this weeks and reports that are not yet have got any admin feedback.</p>
                <a href="problems.php" class="fa-btn btn-1 btn-1e">view more</a>
            </div>
            <div class="col-md-3 images_1_of_4 bg1 text-center">
                <span class="bg"><i class="fa fa-bullhorn"></i></span>
                <h4><a href="problems.php"><em style="color:red"><?php echo $old_reports ; ?></em> Older Reports</a></h4>

                <p class="para">Older reports including reports in this months and previous months and reports that have got admin feedback.</p>
                <a href="problems.php" class="fa-btn btn-1 btn-1e">view more</a>
            </div>
            <div class="col-md-3 images_1_of_4 bg1 text-center">
                <span class="bg"><i class="fa fa-wrench"></i></span>
                <h4><a href="fixed_problems.php"><em style="color:red"><?php echo $fixed_reports ; ?></em> Fixed Problems</a></h4>

                <p class="para">Fixed Problems are the reported Problems that are fixed and thanks to the community.</p>
                <a href="fixed_problems.php" class="fa-btn btn-1 btn-1e">view more</a>
            </div>
            <div class="col-md-3 images_1_of_4 bg1 text-center">
                <span class="bg"><i class="fa fa-comment-o"></i> </span>
                <h4><a href="#"><em style="color:red"><?php echo $total_reports ; ?></em> Total Reports</a></h4>

                <p class="para">Total number of reports that are reported in FixMyArea.com by the FixMyArea Community.</p>
                <a href="all_reports.php" class="fa-btn btn-1 btn-1e">view more</a>
            </div>
        </div>
    </div>
</div><!-- end main -->
<div class="main_btm"><!-- start main_btm -->
	<div class="container">

		<div class="main row">
	    <h1 style="text-align:center">Recently Reported Problems</h1>

		</div>
		<!----start-img-cursual---->

		<div id="owl-demo" class="owl-carousel text-center">

			<?php

			$objReports=new Reports();
			$allData=$objReports->index("obj");
			foreach ($allData as $oneData ){  ?>
				<div class="item">
					<div class="cau_left">

						<div style= "height:250px; width:338px;">

							<img src="../../resource/images/images/<?php echo $oneData->image_1; ?>" class="img-circle" alt="Cinque Terre"style="height: 100%" width="72%">

						</div>
					</div>
					<div class="cau_left">
						<h5><a href="single_view.php?id=<?php echo $oneData->id ?>"><?php echo $oneData->title; ?></a></h5>
						<p>
							<?php echo $oneData->area; ?>
						</p>
					</div>
				</div>
			<?php } ?>
		</div>
		
		<input id="pac-input" class="controls" type="text" placeholder="Search Box">
        <div id="map"></div>
		
	</div>
</div>
		<!----//End-img-cursual---->
<div class="footer_bg"><!-- start footer -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>&copy; 2014 Learner. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></span></p>
			</div>
		</div>
	</div>
</div>

<script>
    function initAutocomplete() {
        var locations = [
            <?php
			
			$objReports = new Reports();
            $allData = $objReports->index("obj");
            $total = count($allData);
            $count = 0;
            foreach ($allData as $oneData) {
                echo '['. $oneData->id . ', \'' . $oneData->title . '\', \'' . $oneData->area . '\', ' . $oneData->latitude . ', ' . $oneData->longitude . ', \'' . $oneData->image_1 . '\']';
                $count++;
                if ($count != $total) {
                    echo ',';
                }
            }
            ?>
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: new google.maps.LatLng(22.3475, 91.8123),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][3], locations[i][4]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    var infowincontent = document.createElement('div');
                    var imageDiv = document.createElement('div');
                    var img = document.createElement('img');
                    img.src = '../../resource/images/images/' + locations[i][5];
                    img.width = 100;
                    img.height = 100;
                    imageDiv.appendChild(img);

                    var textDiv = document.createElement('div');
                    var strong = document.createElement('strong');
                    var link = document.createElement('a');
                    link.textContent = locations[i][1];
                    link.href = 'single_view.php?id=' + locations[i][0];
                    strong.appendChild(link);
                    textDiv.appendChild(strong);

                    var text = document.createElement('text');
                    text.textContent = locations[i][1];
                    textDiv.appendChild(document.createElement('br'));
                    textDiv.appendChild(text);

                    infowincontent.appendChild(imageDiv);
                    infowincontent.appendChild(textDiv);

                    infowindow.setContent(infowincontent);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1N26rn3RBHu1dZrNFijhfIgLo7FRW4qc&libraries=places&callback=initAutocomplete"
    async defer>
</script>


</body>
</html>