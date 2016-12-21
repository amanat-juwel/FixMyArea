<?php
include_once('../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\Utility\Utility;
use App\User\Auth;

$auth = new Auth();
$auth->setData($_POST);
$status1 = $auth->is_exist();
$status2 = $auth->is_exist_nid();

if ($status1 && $status2) {
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> NID and Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
} elseif ($status1) {
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
} elseif ($status2) {
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> NID has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
} else {
    $user = new User();
    $user->setData($_POST);
    $user->setData($_FILES);
    $user->store();
}