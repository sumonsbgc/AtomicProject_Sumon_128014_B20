<?php
include_once("../../../vendor/autoload.php");

use App\Bitm\SEIP128014\Email\Email;

if (isset($_POST['submit'])){
    if((isset($_POST))&&(!empty($_POST))){
        $email = new Email();
        $email->prepare($_POST);
        $email->storeData();
    }else{
        echo "The Field is empty.";
    }
}else{
    echo "Error";
}