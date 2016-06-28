<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Birthday\Birthday;
if ( isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['bday']) ){
    $bday = new Birthday();
    $bday->prepare($_POST)->store();
}