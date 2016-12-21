<?php

include_once('../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\Utility\Utility;

$user = new User();
$user->setData($_POST);

if(empty($_FILES['user_image']['name'])&& !empty($_FILES['user_nid_image']['name'])) {

    $image_name = $_POST['user_image'];
    $temporary_location = "C:\xampp\tmp\php5EF3.tmp";
    move_uploaded_file($temporary_location, '../../../resource/Picture/' . $image_name);
    $user->user_image = $image_name;

}
elseif((empty($_FILES['user_nid_image']['name']))&& !empty($_FILES['user_image']['name'])) {

    $image_name = $_POST['nid_image'];
    $temporary_location = "C:\xampp\tmp\php5EF3.tmp";
    move_uploaded_file($temporary_location, '../../../resource/Picture/' . $image_name);
    $user->user_nid_image = $image_name;
}
elseif(empty($_FILES['user_image']['name'])&& empty($_FILES['user_nid_image']['name'])) {

    if(empty($_FILES['user_image']['name'])) {
        $image_name = $_POST['user_image'];
        $temporary_location = "C:\xampp\tmp\php5EF3.tmp";
        move_uploaded_file($temporary_location, '../../../resource/Picture/' . $image_name);
        $user->user_image = $image_name;
    }
    if (empty($_FILES['user_nid_image']['name'])) {
        $image_name = $_POST['nid_image'];
        $temporary_location = "C:\xampp\tmp\php5EF3.tmp";
        move_uploaded_file($temporary_location, '../../../resource/Picture/' . $image_name);
        $user->user_nid_image = $image_name;
    }
}
else
    $user->setData($_FILES);

$user->update();





