<?php
if (!isset($_SESSION)) session_start();

include_once('../../../vendor/autoload.php');
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

$auth = new Auth();
$auth->setData($_POST);  // this prepare() is  equivalent to setData method
$status = $auth->is_registered();

if ($status) {
    $_SESSION['adminname'] = $_POST['adminname'];
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");

    return Utility::redirect('admin_index.php');

} else {
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    return Utility::redirect('admin_login.php');

}