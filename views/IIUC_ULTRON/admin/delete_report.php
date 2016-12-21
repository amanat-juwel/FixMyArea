<?php
include_once('../../../vendor/autoload.php');
use App\Reports\Reports;

$objReports = new Reports();

if(isset($_GET["id"])) {
    $objReports->setData($_GET);
    $objReports->delete();
}

elseif(isset($_POST["del_id"]))
{
    $objReports->setData($_POST);
    $objReports->delete_multiple();

}

