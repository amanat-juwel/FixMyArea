<?php
include_once('../../vendor/autoload.php');
use App\User\Auth;
use App\Message\Message;
use App\Utility\Utility;

if(!isset($_SESSION) )session_start();

if(isset($_SESSION['email']))
    echo "Hello";
else{
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Reporting Failed!</strong> Please Log in first.
                </div>");
    Utility::redirect('Profile/signup_login.php');
}

?>
