<?php
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Gender\Gender;
if ( (isset($_POST['submit'])) && (!empty($_POST['name'])) && (!empty($_POST['gender'])) ) {
    $gender = new Gender();
    $gender->prepare($_POST)->insertData();
}
?>