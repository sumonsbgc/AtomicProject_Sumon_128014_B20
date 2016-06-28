<?php 
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\City\City;

var_dump($_POST);
if ( isset($_POST['submit'])) {
	$city = new City();
	$city->prepare($_POST)->update();
}