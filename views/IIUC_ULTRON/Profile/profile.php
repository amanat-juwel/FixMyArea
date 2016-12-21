<?php
include_once('../../../vendor/autoload.php');
use App\User\User;
use App\User\Auth;
use App\Utility\Utility;
use App\Message\Message;

if (!isset($_SESSION)) session_start();
//this is required to view a single profile
$_POST['email'] = $_SESSION['email'];

$user = new User();
$user->setData($_POST);
$oneData = $user->view();

/*change password start*/

if (isset($_POST['current_pass'])) {

    $auth = new Auth();
    $_POST['password1'] = $_POST['current_pass'];
    $auth->setData($_POST);
    $result = $auth->check_pass();
    /*if current password match then new password will be set*/
    if ($result) {

        if (isset($_POST['new_pass']) && isset($_POST['confirm_pass'])) {

            if ($_POST['new_pass'] == $_POST['confirm_pass']) {

                $obj = new User();
                $_POST['password1'] = $_POST['new_pass'];
                $obj->setData($_POST);
                $obj->change_password();

                $auth = new Auth();
                $auth->log_out();
                session_destroy();
                session_start();
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
    } else {
        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Error!</strong> Current Password doesn't match!
                </div>");
    }
}
/*change pass word finish*/

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
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
                            <li class="active"><a href="profile.php">Profile</a></li>
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


    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
            <br>
            <p style="font-size: 10px" class=" text-info"><?php date_default_timezone_set("Asia/Dhaka"); echo date("l jS \of F Y h:i:s A"); ?></p>
        </div>
        <div
            class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $oneData->user_name; ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                            src="../../../resource/Picture/<?php echo $oneData->userimage; ?>"
                                                                            class="img-circle img-responsive"></div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>User Name:</td>
                                    <td><?php echo $oneData->user_name; ?></td>
                                </tr>
                                <tr>
                                    <td>NID:</td>
                                    <td><?php echo $oneData->user_nid; ?></td>
                                </tr>
                                <tr>
                                    <td>Present Address</td>
                                    <td><?php echo $oneData->adress; ?></td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Ward No</td>
                                    <td><?php echo $oneData->ward_no; ?></td>
                                </tr>
                                <tr>
                                    <td>Post Office</td>
                                    <td><?php echo $oneData->postoffice; ?></td>
                                </tr>
                                <tr>
                                    <td>Thana</td>
                                    <td><?php echo $oneData->thana; ?></td>
                                </tr>
                                <tr>
                                    <td>Dictrict</td>
                                    <td><?php echo $oneData->district; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $oneData->email; ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $oneData->gender; ?></td>
                                </tr>
                                <tr>
                                    <td>Occupation</td>
                                    <td><?php echo $oneData->occupation; ?></td>
                                </tr>
                                <tr>
                                    <td>NID Image</td>
                                    <td><img src="../../../resource/Picture/<?php echo $oneData->nidimage; ?>"
                                             width="50px" height="60px"></td>
                                </tr>
                                <td>Mobile</td>
                                <td><?php echo $oneData->user_mobile; ?></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer" style="height: 55px">
                    <span class="pull-right">
                            <button type="button" class="btn btn-success btn-md" name="edit"
                                    data-toggle="modal" data-target="#myModal">Edit</button>
                    </span>
                </div>

            </div>


            <div class="panel-footer"
                 style=" width: 550px;height: auto;margin: 0 auto;padding: 10px; position: relative; border: solid 1px; border-color: #2aabd2 ">

                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">Change
                    password
                </button>

            </div>
            <br><br>

            <!--modal for change password-->
            <!-- Modal -->
            <div id="myModal2" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change Password</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="">

                                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">

                                <div class="form-group control-group">
                                    <label class="col-sm-4 control-label" style="font-size: 15px">Current
                                        Password</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="password" name="current_pass" required/>
                                    </div>
                                </div>

                                <div class="form-group control-group">
                                    <label class="col-sm-4 control-label" style="font-size: 15px">New Password</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="password" name="new_pass" required/>
                                    </div>
                                </div>

                                <div class="form-group control-group">
                                    <label class="col-sm-4 control-label" style="font-size: 15px">Confirm
                                        Password</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="password" name="confirm_pass" required/>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- modal for change password finish-->

            <!--modal for updating profile-->
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Your Profile</h4>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form">
                                <form action="update_profile.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="user_image" value="<?php echo $oneData->userimage ?>">
                                    <input type="hidden" name="nid_image" value="<?php echo $oneData->nidimage ?>">
                                    <div>
                                        <span>User Name</span>
                                        <span><input type="text" class="form-control" name="userName" id="userName"
                                                     value="<?php echo $oneData->user_name; ?>" required></span>
                                    </div>
                                    <div>
                                        <span>NID</span>
                                        <span><input type="text" readonly class="form-control" name="nid" required
                                                     value="<?php echo $oneData->user_nid; ?>"></span>
                                    </div>
                                    <div>
                                        <span>Present Address</span>
                                        <span><input type="text" class="form-control" name="address" required
                                                     value="<?php echo $oneData->adress; ?>"></span>
                                    </div>
                                    <div>
                                        <span>Ward No</span>
                                        <span><select class="form-control" name="ward_no" required>
                                <option><?php echo $oneData->ward_no; ?></option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                            </select>
                            </span>
                                    </div>
                                    <div>
                                        <span>Post Office</span>
                                        <span><input type="text" class="form-control" name="post_office" required
                                                     value="<?php echo $oneData->postoffice; ?>"></span>
                                    </div>
                                    <div>
                                        <span>Thana</span>
                                        <span><input type="text" class="form-control" name="thana" required
                                                     value="<?php echo $oneData->thana; ?>"></span>
                                    </div>
                                    <div>
                                        <span>District</span>
                                        <span><select class="form-control" name="district" required>
                                <option><?php echo $oneData->district; ?></option>
                                <option>Dhaka</option>
                                <option>Chittagong</option>
                                <option>Rajshahi</option>
                                <option>Sylhet</option>
                                <option>Khulna</option>
                                <option>Barishal</option>
					            </select>
                            </span>
                                    </div>
                                    <div>
                                        <span>Email</span>
                                        <span><input type="email" class="form-control" name="email" required
                                                     value="<?php echo $oneData->email; ?>"></span>
                                    </div>
                                    <div>
                                        <span>Mobile</span>
                                        <span><input type="text" class="form-control" name="mobile" required
                                                     value="<?php echo $oneData->user_mobile; ?>"></span>
                                    </div>
                                    <div>
                                        <span>Gender</span>
                                        <!--gender checking-->
                                        <?php if (!strcmp($oneData->gender, "Male")) { ?>
                                        <div class="radio"><label><input type="radio" name="gender"
                                                                         value="<?php echo $oneData->gender; ?>"
                                                                         checked/><span>Male</span></label>
                                            <div class="radio"><label><input type="radio" name="gender" value="female"
                                                                             required>Female</label></div>
                                            <?php } ?>

                                            <?php if (!strcmp($oneData->gender, "Female")) { ?>
                                            <div class="radio"><label><input type="radio" name="gender" value="male"
                                                                             required>Male</label>
                                            </div>
                                            <div class="radio"><label><input type="radio" name="gender"
                                                                             value="<?php echo $oneData->gender ?>"
                                                                             checked/><span>Female</span></label>
                                                <?php } ?>

                                            </div>
                                            <!--gender checking finished-->
                                            <div>
                                                <span>Occupation</span>
                                                <span><input type="text" class="form-control" name="occupation" required
                                                             value="<?php echo $oneData->occupation; ?>"></span>
                                            </div>
                                            <div>
                                                <span>User Image</span>
                                                <div><img
                                                        src="<?php echo "../../../resource/Picture/" . $oneData->userimage ?>"
                                                        width="50" height="50" alt="Picture"></div>
                                                <span><input type="file" class="form-control" name="user_image"
                                                             value="<?php echo $oneData->userimage; ?>"></span>
                                            </div>
                                            <div>
                                                <span>NID image</span>
                                                <div><img
                                                        src="<?php echo "../../../resource/Picture/" . $oneData->nidimage ?>"
                                                        width="50" height="50" alt="Picture"></div>
                                                <span><input type="file" class="form-control" name="user_nid_image"
                                                             value="<?php echo $oneData->nidimage; ?>"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default">Update</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- modal finish-->
        </div>
    </div>
</div>
</body>
</html>

<script>
    $('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>