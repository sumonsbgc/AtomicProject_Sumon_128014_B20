<?php
session_start();
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Book\Book;
use App\Bitm\SEIP128014\Book\Message;
$book = new Book();

$allName = $book->allName();
$commaSeparated= implode('","',$allName);

$allSummary = $book->allSummary();
$commaSeparatedSummary = implode('","',$allSummary);




if(array_key_exists('itemPerPage',$_SESSION)) {
    if (array_key_exists('itemPerPage', $_GET)) {
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
    }
}else{
    $_SESSION['itemPerPage']=5;
}

$itemPerPage=$_SESSION['itemPerPage'];
$totalItem=$book->count();
$totalPage = ceil($totalItem/$itemPerPage);

$pagination = "";

if(array_key_exists('pageNumber',$_GET)){
    $pageNumber = $_GET['pageNumber'];
}else{
    $pageNumber = 1;
}

for($i=1; $i<=$totalPage; $i++){
    $class = ($i==$pageNumber)? "active" : "";
    $pagination.="<li class='$class'><a href='index.php?pageNumber=$i'>$i</a></li>";
}

$pageStartFrom = $itemPerPage*($pageNumber-1);
if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) {
    $allBook = $book->paginator($pageStartFrom,$itemPerPage);
}
if(strtoupper($_SERVER['REQUEST_METHOD']=='POST')) {
     $allBook = $book->prepare($_POST)->index();
}
if(strtoupper(($_SERVER['REQUEST_METHOD']=='GET')) && isset($_GET['search'])) {
     $allBook = $book->prepare($_GET)->index();
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book List</title>

    <!-- Bootstrap -->
    <link href="../../../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://www.oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://www.oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12">
              <div class="heading">
                 <h1>Book List</h1>
                  <a class="btn btn-info" href="../../../index.php">Home Page</a>
                  <a class="btn btn-success" href="pdf.php">Download As PDF</a>
                  <a class="btn btn-success" href="excel.php">Download As Excel</a>
                  <a class="btn btn-success" href="mail.php">Send Mail</a>
                  <span><a href="create.php" class="btn btn-info">Add To Book Title</a></span>
                  <span><a href="trashed.php" class="btn btn-info">Trahsed Item</a></span>
              </div>
              <div class="message">
                  <?php 
                  if( (array_key_exists('message',$_SESSION)) && ( !empty($_SESSION['message']) ) ) {
                      echo Message::message();
                  } ?>
              </div>
          </div>
      </div>
  </div>

  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="jumbotron">
                  <form role="form" action="index.php" method="post">
                      <div class="form-group-sm form-inline">
                          <label for="title">Filter by Title:</label>
                          <input class="form-control" type="text" name="filterByTitle" value="" id="title">
                          <label  for="summary">Filter by Description:</label>
                          <input class="form-control" type="text" name="filterByDescription" value="" id="summary">
                          <button type="submit" class="btn-success btn">Submit!</button>
                      </div>
                  </form>
                  <form role="form" action="index.php" method="get">
                      <div class="form-group-sm form-inline">
                          <label for="search">Search:</label>
                          <input class="form-control" type="text" name="search" value="" id="search">
                          <button class="btn btn-success" type="submit">Search</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-ls-12 col-md-12">
                <div class="floatLeft">
                    <div class="form-group">
                        <form role="form" action="">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" id="sel1" name="itemPerPage">
                                <option <?php if($itemPerPage == 5){echo "selected"; } ?>>5</option>
                                <option <?php if($itemPerPage == 10 ){ echo "selected"; } ?>>10</option>
                                <option <?php if($itemPerPage == 15){echo "selected"; } ?>>15</option>
                                <option <?php if($itemPerPage==20){echo "selected"; } ?>>20</option>
                            </select>
                            <input class="btn btn-default" type="submit" value="Submit" name="submit">
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>ID</th>
                                <th>Book Title</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sl=0;
                        foreach($allBook as $book){
                           $sl++; ?>

                            <tr>
                                <th scope="2"><?php echo $sl+$pageStartFrom; ?></th>
                                <td><?php echo $book->id; ?></td>
                                <td><?php echo $book->title; ?></td>
                                <td><?php echo $book->email; ?></td>
                                <td><?php echo $book->description; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="view.php?id=<?php echo $book->id; ?>">View</a>
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $book->id; ?>">Update</a>
                                    <a class="btn btn-info" href="delete.php?id=<?php echo $book->id; ?>">Delete</a>
                                    <a class="btn btn-warning" href="trash.php?id=<?php echo $book->id; ?>">Trash</a>
                                </td>
                            </tr>
                       <?php }?>
                        </tbody>
                    </table>
                </div>
                <?php if((strtoupper($_SERVER['REQUEST_METHOD']=='GET'))&&(empty($_GET['search']))) { ?>
                <ul class="pagination">
                    <?php if( $pageNumber > 1 ): ?>
                        <li><a href="index.php?pageNumber=<?php $prev = $pageNumber-1; echo $prev; ?>">Prev</a></li>
                    <?php endif; ?>

                    <?php echo $pagination; ?>

                    <?php  if( $pageNumber < $totalPage ): ?>
                        <li><a href="index.php?pageNumber=<?php $next = $pageNumber+1; echo $next;?>">Next</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

  <script>
      $(".message").show().delay(3000).fadeOut();
  </script>
  <script>
      $( function() {
          var name = [ <?php echo '"'.$commaSeparated.'"'; ?> ];
          var summary = [ <?php echo '"'.$commaSeparatedSummary.'"'; ?> ];
          var allSummary = [ <?php echo '"'.$commaSeparated.' '.$commaSeparatedSummary.'"'?>];

          $( "#title" ).autocomplete({
              source: name
          });

          $("#summary").autocomplete({
              source: summary
          });

          $("#search").autocomplete({
              source: allSummary
          })
      } );
  </script>
  </body>
</html>