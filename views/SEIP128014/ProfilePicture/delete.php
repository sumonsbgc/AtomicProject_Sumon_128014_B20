<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\ProfilePicture\ProfilePicture;
$profile = new ProfilePicture();
$singleImage = $profile->prepare($_GET)->selectById();
unlink($_SERVER['DOCUMENT_ROOT'].'AtomicProject_Sumon_128014_B20/resource/img/'.$singleImage->image);
$profile->prepare($_GET)->deleteData();