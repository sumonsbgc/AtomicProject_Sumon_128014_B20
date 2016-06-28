<?php 
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\City\City;


if ( (isset($_POST['submit'])) && (!empty($_POST['name'])) && (!empty($_POST['city'])) ) {
    $city = new City();
    
    $city->prepare($_POST)->store();
}
?>