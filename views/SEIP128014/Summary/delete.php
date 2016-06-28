<?php 
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Summary\Summary;
$summary = new Summary();
$summary->prepare($_GET)->delete();
?>