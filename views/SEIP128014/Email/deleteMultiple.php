<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Email\Email;
$email = new Email();
$email->deleteMultiple($_POST['mark']);