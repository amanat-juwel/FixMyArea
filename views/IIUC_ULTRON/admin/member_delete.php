<?php
include_once('../../../vendor/autoload.php');
use App\User\User;

$objUser = new User();

if(isset($_GET["user_id"])) {
    $objUser->setData($_GET);
    $objUser->delete();
}

elseif(isset($_POST["del_id"]))
{
    $objUser->setData($_POST);
    $objUser->delete_multiple();

}

