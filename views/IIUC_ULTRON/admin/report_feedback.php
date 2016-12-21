<?php
include_once('../../../vendor/autoload.php');
use App\Reports\Reports;

$objReports = new Reports();

if(isset($_GET["id"])) {
    $objReports->setData($_GET);
	$objReports->update_feedback();
}



