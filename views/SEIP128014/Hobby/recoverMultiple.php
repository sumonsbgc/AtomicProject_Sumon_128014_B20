<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Hobby\Hobby;
$hobby = new Hobby();
var_dump($_POST);
$hobby->recoverMultiple($_POST['mark']);