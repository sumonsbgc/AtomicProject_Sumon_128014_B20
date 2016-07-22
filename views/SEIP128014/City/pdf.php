<?php
include_once '../../../vendor/autoload.php';
include_once '../../../vendor/mpdf/mpdf/mpdf.php';
use App\Bitm\SEIP128014\City\City;
$city = new City();
$allData = $city->selectAll();
$sl = 0;
$listInfo = "<thead>
<tr>
<th>#SL</th>
<th>ID</th>
<th>Name</th>
<th>City Name</th>
<th>Email</th>
<th>Description</th>
</tr>
</thead>";

$listInfo.="<tbody>";
foreach ($allData as $bd) {
    $sl++;
    $listInfo .="<tr>";
    $listInfo .="<td>{$sl}</td>";
    $listInfo .="<td>{$bd->id}</td>";
    $listInfo .="<td>{$bd->name}</td>";
    $listInfo .="<td>{$bd->city}</td>";
    $listInfo .="<td>{$bd->email}</td>";
    $listInfo .="<td>{$bd->description}</td>";
    $listInfo .="<tr>";
}
$listInfo.="</tbody>";


$html = <<<body
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Detail List</title>
    <!-- Bootstrap -->
    <link href="../../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h2>User's All Information</h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    $listInfo
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
body;


$mpdf = new mPDF();
// Write some HTML code:
$mpdf->WriteHTML($html);
// Output a PDF file directly to the browser
$mpdf->Output('city.pdf','D');
