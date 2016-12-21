<?php
require_once("../../../vendor/autoload.php");
use App\User\Auth;

$obj = new Auth();
$obj->setData($_POST);
$obj->check_email();
