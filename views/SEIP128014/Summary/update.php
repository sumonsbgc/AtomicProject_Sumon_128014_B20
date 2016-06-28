<?php 
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Summary\Summary;

if(isset($_POST['submit'])){
	$summary = new Summary();
	$summary->prepare($_POST)->update();	
}

?>