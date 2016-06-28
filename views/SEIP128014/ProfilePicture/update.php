<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\ProfilePicture\ProfilePicture;

$profile = new ProfilePicture();

$singleImage = $profile->prepare($_POST)->selectById();

if ( (isset($_POST['name'])) && !empty($_POST['name']) ){
    if ( (isset($_FILES)) && (!empty($_FILES['image']['name'])))
    {
        $imgName = time().$_FILES['image']['name'];
        $temporaryLocation = $_FILES['image']['tmp_name'];
        unlink($_SERVER['DOCUMENT_ROOT'].'AtomicProject_Sumon_128014_B20/resource/img/'.$singleImage->image);
        move_uploaded_file($temporaryLocation, '../../../resource/img/'.$imgName);
        $_POST['image'] = $imgName;
    }
}

$profile->prepare($_POST)->updateData();