<?php
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\City\City;
$city = new City();
$list = $city->prepare($_GET)->recover();