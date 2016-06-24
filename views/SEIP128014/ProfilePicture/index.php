<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\ProfilePicture\ProfilePicture;
use App\Bitm\SEIP128014\Book\Message;
$profile = new ProfilePicture();
$image = $profile->selectAllData();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Upload Your Image</title>
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
                <h2>Your Profile Picture</h2>
                <a href="create.php" class="btn btn-info">Insert Your Profile Image</a>
                <a href="trashList.php" class="btn btn-info">Trash List</a>
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
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#SL</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Profile Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sl = 0;
                        foreach ($image as $img){
                         $sl++;
                    ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $img->id; ?></td>
                        <td><?php echo $img->name; ?></td>
                        <td><img src="../../../resource/img/<?php echo $img->image; ?>" alt="" width="200px" height="200px"></td>
                        <td>
                            <a href="view.php?id=<?php echo $img->id; ?>" class="btn btn-info">View</a>
                            <a href="edit.php?id=<?php echo $img->id; ?>" class="btn btn-info">Update</a>
                            <a href="delete.php?id=<?php echo $img->id; ?>" class="btn btn-info">Delete</a>
                            <a href="trash.php?id=<?php echo $img->id; ?>" class="btn btn-info">Trash</a>
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
    jQuery('#message').show().delay(3000).fadeOut();
</script>
</body>
</html>
