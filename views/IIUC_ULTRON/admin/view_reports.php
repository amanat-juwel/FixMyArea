
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
	
	<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #000711;
    color: white;
}
</style>
<style>
.button3 {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 7px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
	border-radius: 8px;
}
</style>
	
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
<h2 style="text-align:center">Manage All Reports</h2>
<div style="margin-left: 8% ;margin-right: 8%;margin-top:2%;margin-bottom:10%; width: 1100px;">

<table> 
	
	
	<tr style="text-align:center">
		<th style="text-align:center;width:7%">id</th>
		<th style="text-align:center;width:10%">Date</th>
		<th style="text-align:center;width:7%">Author</th>
		<th style="text-align:center;width:6%">word no</th>
		<th style="text-align:center;width:10%">Title:</th>
		<th style="text-align:center;width:5%">Image</th>
		<th style="text-align:center;width:20%">Description</th>	
		<th style="text-align:center;width:35%" colspan="3">Action</th>
	</tr>
<?php 
            $objReports = new Reports();
            $allData = $objReports->index("obj");
			
            ######################## pagination code block#1 of 2 start ######################################
            $recordCount = count($allData);


            if (isset($_REQUEST['Page'])) $page = $_REQUEST['Page'];
            else if (isset($_SESSION['Page'])) $page = $_SESSION['Page'];
            else   $page = 1;
            $_SESSION['Page'] = $page;

            if (isset($_REQUEST['ItemsPerPage'])) $itemsPerPage = $_REQUEST['ItemsPerPage'];
            else if (isset($_SESSION['ItemsPerPage'])) $itemsPerPage = $_SESSION['ItemsPerPage'];
            else   $itemsPerPage = 3;
            $_SESSION['ItemsPerPage'] = $itemsPerPage;

            $pages = ceil($recordCount / $itemsPerPage);
            $someData = $objReports->indexPaginator($page, $itemsPerPage);

            $serial = (($page - 1) * $itemsPerPage) + 1;

            ####################### pagination code block#1 of 2 end #########################################
			
			$srl = 0;
            foreach ($someData as $oneData) { ?>
       <tr>
		<td style="text-align:center"><?php echo $oneData->id; ?></td>
		<td style="text-align:center"><?php echo $oneData->date; ?></td>
		<td style="text-align:center"><?php echo $oneData->author; ?></td>
		<td style="text-align:center"><?php echo $oneData->ward_no; ?></td>
		<td style="text-align:center"><?php echo $oneData->title; ?></td>
		<td style="text-align:center"><img src="../../../resource/images/images/<?php echo $oneData->image_1; ?>" width="100" height="100"></td>
		<td style="text-align:left"><?php echo $oneData->description; ?></td>
		<td style="text-align:center"><form action="report_feedback.php" method="get"><textarea name="admin_feedback"><?php echo $oneData->admin_feedback; ?></textarea><br><input hidden name="id" value="<?php echo $oneData->id?>"> <button class="btn btn-warning"> Update</button></form></td>
		

		</td>
		<td style="text-align:center"><a class="btn btn-success" href="success_report.php?id=<?php echo $oneData->id;?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Done</a></td>
		<td style="text-align:center"><a href="delete_report.php?id=<?php echo $oneData->id ?>" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-danger" role="button"><span class="glyphicon glyphicon - trash"></span> Delete</a> <input type="checkbox" name="del_id[]" class="delete_customer" value="<?php echo $oneData->id ; ?>" /></td>

		
	</tr>

<?php } ?>
</table>

               <div align="right">
                <button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger">Delete Selected</button>     
                </div>

<!--  ######################## pagination code block#2 of 2 start ###################################### -->
            <div style="display: inline; " class="container">
                <ul class="pagination">

                    <?php
                    error_reporting(0);
                    $prev = 1;
                    if ($prev != $page) {
                        $prev = $page - 1;
                        echo "<li><a href='?Page=$prev'>" . "Previous" . '</a></li>';
                    }
                    for ($i = 1; $i <= $pages; $i++) {
                        $next = $page;
                        if ($i == $page) echo '<li class="active"><a href="">' . $i . '</a></li>';
                        else  echo "<li><a href='?Page=$i'>" . $i . '</a></li>';

                    }
                    if ($next < $pages) {
                        $next = $next + 1;
                        echo "<li><a href='?Page=$next'>" . "Next" . '</a></li>';
                    }

                    ?>

                    <select class="form-control" name="ItemsPerPage" id="ItemsPerPage"
                            onchange="javascript:location.href = this.value;">
                        <?php
                        if ($itemsPerPage == 3) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                        if ($itemsPerPage == 4) echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                        else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                        if ($itemsPerPage == 5) echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                        if ($itemsPerPage == 6) echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                        if ($itemsPerPage == 10) echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                        if ($itemsPerPage == 15) echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                        else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                        ?>
                    </select>
                </ul>
            </div>
            <!--  ######################## pagination code block#2 of 2 end ###################################### -->
			<br><a href="admin_index.php"  class="btn btn-primary" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back to Index</a>
		    <div id="display-success"><?php if(isset($_GLOBAL)) echo $_GLOBAL; ?></div>	
	 <script>
        $('#display-success').show().delay(10).fadeOut();
        $('#display-success').show().delay(10).fadeIn();
        $('#display-success').show().delay(10).fadeOut();
        $('#display-success').show().delay(10).fadeIn();
        $('#display-success').show().delay(1200).fadeOut();
    </script>

</div>

<!--Start of Ajax for multiple delete-->
	<script>
		$(document).ready(function(){
			$('#btn_delete').click(function(){
				if(confirm("Are you sure you want to delete this?"))
				{
					var del_id = [];
					$(':checkbox:checked').each(function(i){
						del_id[i] = $(this).val();
					});
					if(del_id.length === 0) //tell you if the array is empty
					{
						alert("Please Select atleast one checkbox");
					}
					else
					{
						$.ajax({
							url:'delete.php',
							method:'POST',
							data:{del_id:del_id},
							success:function()
							{
								location.reload();
							}
						});
					}
				}
				else
				{
					return false;
				}
			});
		});
	</script>
	<!--End of Ajax for multiple delete-->

	

  <!-- Modal -->



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



