<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Birthday\Birthday;
use App\Bitm\SEIP128014\Book\Message;
$birthday = new Birthday();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                <h2>Users Birth Date List</h2>
                <a href="create.php" class="btn btn-info">Insert Your Birth Date</a>
                <a href="trashList.php" class="btn btn-default">Trash List</a>
                <div id="message">
                    <?php echo Message::message(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Birth Date</th>
                            <th>Action</th>
                       </tr>
                    </thead>
                    <?php
                       $sl = 0;
                        foreach (){
                       $sl++;
                    ?>
                    <tbody>
                       <tr>
                           <td><?php ?></td>
                           <td><?php ?></td>
                           <td><?php ?></td>
                           <td><?php ?></td>
                           <td>
                               <a href="view.php?id=<?php ?>" class="btn btn-info">View</a>
                               <a href="edit.php?id=<?php ?>" class="btn btn-info">Update</a>
                               <a href="delete.php?id=<?php ?>" class="btn btn-danger">Delete</a>
                               <a href="trash.php?id=<?php ?>" class="btn btn-warning">Trash</a>
                           </td>
                       </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    jQuery("#message").show().delay(3000).fadeOut();
</script>
</body>
</html>