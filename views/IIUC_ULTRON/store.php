<?php
require_once("../../vendor/autoload.php");
use App\Reports\Reports;

        $image_name1= time().$_FILES['image_1']['name'];
        $temporary_location= $_FILES['image_1']['tmp_name'];
        $myLocation1= '../../resource/images/images/'.$image_name1;
		move_uploaded_file($temporary_location, $myLocation1 );
		
		$image_name2= time().$_FILES['image_2']['name'];
        $temporary_location= $_FILES['image_2']['tmp_name'];
        $myLocation2= '../../resource/images/images/'.$image_name2;
		move_uploaded_file($temporary_location, $myLocation2 );
		
		$image_name3= time().$_FILES['image_3']['name'];
        $temporary_location= $_FILES['image_3']['tmp_name'];
        $myLocation3= '../../resource/images/images/'.$image_name3;
		move_uploaded_file($temporary_location, $myLocation3 );
		
		$video= $_FILES['video']['name'];
        $temporary_location= $_FILES['video']['tmp_name'];
        $myLocation4= '../../resource/images/images/'.$video;
		move_uploaded_file($temporary_location, $myLocation4 );

$objReports = new Reports();

$objReports->setData(array("title"=>$_POST['title'],"author"=>$_POST['author'],"category"=>$_POST['category'],"area"=>$_POST['area'],"ward_no"=>$_POST['ward_no'],"description"=>$_POST['description'], "image_1"=>$image_name1, "image_2"=>$image_name2, "image_3"=>$image_name3, "video"=>$video, "latitude"=> $_POST['latitude'], "longitude"=>$_POST['longitude']));
$objReports->store();
