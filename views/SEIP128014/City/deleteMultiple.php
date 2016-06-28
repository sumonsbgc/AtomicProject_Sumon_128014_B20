<?php 
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\City\City;
$city = new City();
var_dump($_POST);
var_dump($_POST['mark']);
$city->deleteMultiple($_POST['mark']);