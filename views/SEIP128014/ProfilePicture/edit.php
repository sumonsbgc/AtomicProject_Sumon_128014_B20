<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\ProfilePicture\ProfilePicture;
$profile = new ProfilePicture();
$editImage = $profile->prepare($_GET)->selectById();
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
                <h2>Upload Your Profile image</h2>
                <a href="index.php" class="btn btn-info">Index Page</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="formArea">
                <form method="post" action="update.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Your Name</label>
                        <input type="text" name="name" value="<?php echo $editImage->name;  ?>" class="form-control" id="exampleInputEmail1">
                        <input type="hidden" name="id" value="<?php echo $editImage->id;  ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="image" id="exampleInputFile">
                        <p class="help-block"><img src="../../../resource/img/<?php echo $editImage->image; ?>" alt=""></p>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
