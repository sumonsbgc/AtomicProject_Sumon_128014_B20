<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Birthday\Birthday;
$bday = new Birthday();
$bday->recoverMultiple($_POST['mark']);