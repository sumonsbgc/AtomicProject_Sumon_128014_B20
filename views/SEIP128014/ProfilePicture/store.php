<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\ProfilePicture\ProfilePicture;

if ( (isset($_POST['name'])) && !empty($_POST['name']) ){
    if ( (isset($_FILES)) && (!empty($_FILES['image']['name'])))
    {
        $imgName = time().$_FILES['image']['name'];
        $temporaryLocation = $_FILES['image']['tmp_name'];
        move_uploaded_file($temporaryLocation, '../../../resource/img/'.$imgName);
        $_POST['image'] = $imgName;
    }
}
$profile = new ProfilePicture();
$profile->prepare($_POST)->insertData();