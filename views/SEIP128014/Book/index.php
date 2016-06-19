<?php
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Book\Book;
use App\Bitm\SEIP128014\Book\Message;

$book = new Book();
$allBook = $book->index();

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
                  <span><a href="create.php" class="btn btn-info">Add To Book Title</a></span>
                  <span><a href="trashed.php" class="btn btn-info">Trahsed Item</a></span>
              </div>
              <div class="message">
                  <?php echo Message::message(); ?>
              </div>
          </div>
      </div>
  </div>
    <div class="container">
        <div class="row">
            <div class="col-ls-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>ID</th>
                                <th>Book Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sl=0;
                        foreach($allBook as $book){
                           $sl++; ?>

                            <tr>
                                <th scope="2"><?php echo $sl; ?></th>
                                <td><?php echo $book->id; ?></td>
                                <td><?php echo $book->title; ?></td>
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
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  <script>
      $(".message").show().delay(3000).fadeOut();
  </script>
  </body>
</html>