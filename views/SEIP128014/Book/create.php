<?php
use App\Bitm\SEIP128014\Book\Message;
?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Book Title</title>
        <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../../resource/bootstrap/js/bootstrap.js">
    </head>
    <body>

    </body>
</html>
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
        <div class="col-ls-12 div col-md-12">
            <h2>Add Book Title</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-ls-12 col-md-12">
            <div class="form-group">
                <form role="form" action="store.php" method="post">
                    <div class="form-group">
                        <label for="pwd">Book Title:</label>
                        <input type="text" name="title" class="form-control" id="pwd">
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>