<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Hobby\Hobby;
use App\Bitm\SEIP128014\Book\Message;

$hobby = new Hobby();
$hobbyData = $hobby->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hobbies</title>

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
                <h2>Display Information about user Hobby</h2>
                <div class="menu">
                    <a class="btn btn-info" href="create.php">Insert Your Data</a>
                    <a href="trashList.php" class="btn btn-danger">Trash List</a>
                </div>
                <div id="message">
                    <?php echo Message::message(); ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Hobbies</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sl = 0;
                        foreach($hobbyData as $Hobby){
                            $sl++;
                    ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $Hobby->id;?></td>
                            <td><?php echo $Hobby->name;?></td>
                            <td><?php echo $Hobby->hobby;?></td>
                            <td>
                                <a class="btn btn-info" href="view.php?id=<?php echo $Hobby->id; ?>">View</a>
                                <a class="btn btn-primary" href="edit.php?id=<?php echo $Hobby->id; ?>">Update</a>
                                <a class="btn btn-warning" href="delete.php?id=<?php echo $Hobby->id; ?>">Delete</a>
                                <a class="btn btn-danger" href="trash.php?id=<?php echo $Hobby->id; ?>">Trash</a>
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