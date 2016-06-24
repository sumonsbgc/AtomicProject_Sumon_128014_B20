<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Birthday\Birthday;
$birthday = new Birthday();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trash List</title>
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
                <a href="index.php" class="btn btn-info">Index Page</a>
                <a href="index.php" class="btn btn-info">Insert Your Birth Date</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form enctype="multipart/form-data" method="post" action="recoverMultiple.php" id="multiple">
                <input class="btn btn-success" type="submit" value="Recover Multiple" name="recover" id="recover">
                <input class="btn btn-warning" type="submit" value="Delete Multiple" name="delete" id="delete">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Select Item</th>
                            <th>#SL</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Birth Date</th>
                            <th>Action</th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td><input type="checkbox" name="mark[]" value="<?php ?>"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="recover.php?id=<?php ?>" class="btn btn-info">Recover</a>
                                <a href="delete.php?id=<?php ?>" class="btn btn-info">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
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