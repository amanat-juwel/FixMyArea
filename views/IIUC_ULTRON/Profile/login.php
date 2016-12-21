<?php
if (!isset($_SESSION)) session_start();

include_once('../../../vendor/autoload.php');
use App\User\Auth;
use App\Message\Message;
use App\Utility\Utility;

$auth = new Auth();
$auth->setData($_POST);  // this prepare() is  equivalent to setData method
$status = $auth->is_registered();

if ($status) {
    $_SESSION['email'] = $_POST['email'];
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");

    return Utility::redirect('profile.php');

} else {
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    return Utility::redirect('signup_login.php');

}