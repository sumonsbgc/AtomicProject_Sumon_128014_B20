<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Birthday\Birthday;
$birthday = new Birthday();
$singleUpdate = $birthday->prepare($_GET)->selectById();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit</title>

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
                <h2>Edit Your BirthDate</h2>
                <a href="index.php" class="btn btn-info">Index Page</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form enctype="multipart/form-data" method="post" action="update.php">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $singleUpdate->id; ?>">
                </div>
                <div class="form-group">
                    <label>Your Name</label>
                    <input type="text" name="name" class="form-control"  value="<?php echo $singleUpdate->name ?>"/>
                </div>
                <div class="form-group">
                    <?php $newDate = date("d-m-Y", strtotime($singleUpdate->bday)); ?>
                    <label>Birth Date :</label> <?php echo $newDate; ?>
                    <input type="date" name="bday" class="form-control" value="<?php echo $singleUpdate->bday; ?>" >
                </div>
                <button type="submit" name="submit" class="btn btn-default">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>