<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\ProfilePicture\ProfilePicture;
$profile = new ProfilePicture();
$profile->prepare($_GET)->deleteData();