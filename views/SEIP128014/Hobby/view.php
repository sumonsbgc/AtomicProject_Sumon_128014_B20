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
            <form role="form" action="store.php" method="post">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" name="name" class="form-control" id="email">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="hobby[]" value="Playing"> Playing </label>
                    <label><input type="checkbox" name="hobby[]" value="Coding"> Coding </label>
                    <label><input type="checkbox" name="hobby[]" value="Reading"> Reading </label>
                    <label><input type="checkbox" name="hobby[]" value="Gardening"> Gardening </label>
                    <label><input type="checkbox" name="hobby[]" value="Swimming"> Swimming </label>
                    <label><input type="checkbox" name="hobby[]" value="Chatting"> Chatting </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>