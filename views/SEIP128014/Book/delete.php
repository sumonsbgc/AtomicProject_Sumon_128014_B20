<?php
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Book\Book;

$book = new Book();
$book->prepare($_GET)->delete();