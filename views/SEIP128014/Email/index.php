<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Email\Email;
use App\Bitm\SEIP128014\Book\Message;
$email = new Email();
$emailList = $email->index();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Email List</title>
    <!-- Bootstrap -->
    <link href="../../../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="jumbotron">
            <a href="create.php" class="btn btn-info">Insert Email</a>
            <a href="trashList.php" class="btn btn-info">Trashed Item</a>
            <div id="message">
              <p><?php echo Message::message(); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#Sl</th>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $sl=0;
                foreach ($emailList as $email){
                $sl++;
              ?>
                <tr>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $email->id; ?></td>
                  <td><?php echo $email->email; ?></td>
                  <td>
                    <a href="view.php?id=<?php echo $email->id; ?>" class="btn btn-info">View</a>
                    <a href="update.php?id=<?php echo $email->id; ?>" class="btn btn-danger">Update</a>
                    <a href="delete.php?id=<?php echo $email->id; ?>" class="btn btn-warning">Delete</a>
                    <a href="trash.php?id=<?php echo $email->id; ?>" class="btn btn-success">Trash</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
    <script>
      jQuery("#message").show().delay(3000).fadeOut();
    </script>
  </body>
</html>