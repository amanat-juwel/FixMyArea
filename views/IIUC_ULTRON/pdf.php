<?php
require_once("../../vendor/autoload.php");
use App\Reports\Reports;

 $obj= new Reports();
 $recordSet=$obj->index();
 //var_dump($allData);
$trs="";
$sl=0;




    foreach($recordSet as $row) {
        $id =  $row["id"];
        $title = $row['title'];
		$category = $row['category'];
		$area = $row['area'];
        $author = $row['author'];

        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='150'> $sl</td>";
        $trs .= "<td width='150'> $id </td>";
        $trs .= "<td width='300'> $title </td>";
		$trs .= "<td width='300'> $category </td>";
		$trs .= "<td width='300'> $area </td>";
        $trs .= "<td width='300'> $author </td>";


        $trs .= "</tr>";
    }

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Title</th>
					<th align='left' >Category</th>
					<th align='left' >Adress</th>
                    <th align='left' >Author</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>




BITM;


// Require composer autoload
require_once ('../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('list.pdf', 'D');