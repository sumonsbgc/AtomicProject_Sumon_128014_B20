<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Hobby\Hobby;
$hobby = new Hobby();
$hobbyData = $hobby->prepare($_GET)->delete();