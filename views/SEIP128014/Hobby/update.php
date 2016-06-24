<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Hobby\Hobby;
$hobby = new Hobby();
$update = $_POST["hobby"];
$ImplodeUpdate = implode(",",$update);
$_POST["hobby"] = $ImplodeUpdate;
$updateHobbies = $hobby->prepare($_POST)->update();