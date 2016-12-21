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

if(!isset( $_SESSION)) session_start();
$_GLOBAL= Message::message();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>FixMyArea</title>
<!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

<!----font-Awesome----->
   	<link rel="stylesheet" href="../../resource/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<link rel="stylesheet" href="../../resource/css/flexslider.css" type="text/css" media="screen" />
	<!-- Scroll to top-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow7.js"></script>
    <noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>
	<!-- Scroll to top End-->
</head>
<body>
<div class="header_bg1">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a href="index.php">FixMyArea </a></h1>
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
		        <li><a href="index.php">Home</a></li>
		        <li><a href="problems.php">View Problems</a></li>
		        <li><a href="all_reports.php">All Reports </a></li>
		        <li class="active"><a href="fixed_problems.php">Recently Fixed Problems</a></li>
		        <li><a href="report_a_problem.php">Report a Problem</a></li>
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
	<div class="container">
		<div class="technology row">
			<h2></h2>
			
			<?php

				$objReports=new Reports();
				$allData=$objReports->index_fixed("obj");
				
				 ################## search  block1 start ##################
                 if(isset($_REQUEST['search']) )$allData =  $objReports->search($_REQUEST);

                $availableKeywords=$objReports->getAllKeywords();
                $comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
                ################## search  block1 end ##################

				
				######################## pagination code block#1 of 2 start ######################################
				$recordCount= count($allData);


				if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
				else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
				else   $page = 1;
				$_SESSION['Page']= $page;

				if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
				else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
				else   $itemsPerPage = 3;
				$_SESSION['ItemsPerPage']= $itemsPerPage;

				$pages = ceil($recordCount/$itemsPerPage);
				$someData = $objReports->indexPaginator_fixed($page,$itemsPerPage);

				$serial = (($page-1) * $itemsPerPage) +1;

				####################### pagination code block#1 of 2 end #########################################
				
				 ################## search  block2 start ##################

                if(isset($_REQUEST['search']) ) {
                $someData = $objReports->search($_REQUEST);
                 $serial = 1;
                          }
                 ################## search  block2 end ##################

				$srl=0;
				foreach ($someData as $oneData ){  ?>
			
			<div class="technology_list">
				<h4><?php echo $oneData->title; ?></h4>			
				<div class="col-md-10 tech_para">
					<p class="para">Submitted by <strong><?php echo $oneData->author; ?></strong> at <strong><?php echo $oneData->date; ?></strong></p>
				</div>
				<div class="col-md-10 tech_para">
					<p class="para"><?php echo $oneData->description; ?></p>
				</div>
				<div class="col-md-2 images_1_of_4 bg1 pull-right">
					<span class="bg"><img src="../../resource/images/images/<?php echo $oneData->image_1; ?>"  alt="Lazy Owl Image" class="img-rounded" width=150px; height=150px; ></span>
				</div>
				<div class="clearfix"></div>
				<div class="read_more">
					<a href="single_view.php?id=<?php echo $oneData->id ?>" class="fa-btn btn-1 btn-1e">View more</a>
				</div>	
			</div>
			
													<?php } ?>
	
		    <!--  ######################## pagination code block#2 of 2 start ###################################### -->
				<div style="display: inline" class="container">
					<ul class="pagination">

					<?php
					error_reporting(0);
					$prev=1;
					if($prev!=$page){
					$prev=$page-1;
					echo "<li><a href='?Page=$prev'>" . "Previous" . '</a></li>';
					}
						for($i=1;$i<=$pages;$i++)
							{
								$next=$page;
								if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
								else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

								}
							if($next<$pages){
									$next=$next+1;
									echo "<li><a href='?Page=$next'>" . "Next" . '</a></li>';
									}

									?>

									<select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
																<?php
																if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
																else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

																if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
																else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

																if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
																else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

																if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
																else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

																if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
																else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

																if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
																else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
																?>
															</select>
														</ul>
									</div>
													<!--  ######################## pagination code block#2 of 2 end ###################################### -->


												 <!-- required for search, block5 start -->
                                        <script>

                                            $(function() {
                                                var availableTags = [

                                                    <?php
                                                    echo $comma_separated_keywords;
                                                    ?>
                                                ];
                                                // Filter function to search only from the beginning of the string
                                                $( "#searchID" ).autocomplete({
                                                    source: function(request, response) {

                                                        var results = $.ui.autocomplete.filter(availableTags, request.term);

                                                        results = $.map(availableTags, function (tag) {
                                                            if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                                                                return tag;
                                                            }
                                                        });

                                                        response(results.slice(0, 15));

                                                    }
                                                });


                                                $( "#searchID" ).autocomplete({
                                                    select: function(event, ui) {
                                                        $("#searchID").val(ui.item.label);
                                                        $("#searchForm").submit();
                                                    }
                                                });


                                            });

                                        </script>
                                        <!-- required for search, block5 end -->	
													
		
			<!-- <div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Warning!</strong> Better check yourself, you're not looking too good.
			</div> -->
		</div>
	</div>
</div><!-- end main -->
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