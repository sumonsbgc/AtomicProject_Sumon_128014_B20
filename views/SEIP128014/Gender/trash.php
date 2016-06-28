<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Gender\Gender;
$gender = new Gender();
$gender->prepare($_GET)->trash();
?>