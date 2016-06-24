<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Hobby\Hobby;

$hobby = new Hobby();
$trash = $hobby->prepare($_GET)->trash();