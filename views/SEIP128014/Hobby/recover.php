<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Hobby\Hobby;
$hobby = new Hobby();
$hobby->prepare($_GET)->recover();