<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Hobby\Hobby;
$hobby = new Hobby();
$hobbyData = $_POST["hobby"];
$stringHobbyData = implode(",",$hobbyData);
$_POST["hobby"] = $stringHobbyData;
$hobby->prepare($_POST)->store();

