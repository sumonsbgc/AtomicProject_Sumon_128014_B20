<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Email\Email;
$email = new Email();
$varOne = $email->recoverMultiple($_POST['mark']);
var_dump($_POST);