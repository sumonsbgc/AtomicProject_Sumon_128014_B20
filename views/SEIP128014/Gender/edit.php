<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Gender\Gender;
$gender = new Gender();
$singleItem = $gender->prepare($_GET)->selectById();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create</title>
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
                <h2>Update Your Gender</h2>
                <a href="index.php" class="btn btn-info">Index Page</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="update.php">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $singleItem->name ?>">
                    <input type="hidden" name="id" value="<?php echo $singleItem->id; ?>">
                </div>
                <div class="radio">
                    <label><input type="radio" value="Male" name="gender" <?php if ( $singleItem->gender == "Male"){ echo "checked"; } ?>>Male</label>
                </div>
                <div class="radio">
                    <label><input type="radio" value="Female" name="gender"  <?php if ( $singleItem->gender == "Female"){ echo "checked"; } ?>>Female</label>
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