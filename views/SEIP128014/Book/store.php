<?php
include_once("../../../vendor/autoload.php");

use App\Bitm\SEIP128014\Book\Book;

if($_SERVER["REQUEST_METHOD"]== "POST"){
if(isset($_POST["submit"])){
    if((isset($_POST["title"])) && (!empty($_POST["title"]))){
        $book = new Book();
        $book->prepare($_POST);
        $book->storeData();

    }else{
        echo "Sorry!! The Field is empty!";
    }
}
}