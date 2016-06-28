<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Birthday\Birthday;
var_dump($_POST);
if ( isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['bday']) ){
    $bday = new Birthday();
    $bday->prepare($_POST)->update();
}
