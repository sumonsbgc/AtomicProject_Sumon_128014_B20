<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Hobby\Hobby;
$hobby = new Hobby();

$UpdateHobby = $hobby->prepare($_GET)->singleView();
$explodeUpdate = explode(",", $UpdateHobby->hobby);
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
            <form role="form" action="update.php" method="post">
                <div class="form-group">
                    <label for="name">Email address:</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $UpdateHobby->name; ?>">
                    <input type="hidden" value="<?php echo $UpdateHobby->id; ?>" name="id">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $UpdateHobby->email; ?>">
                </div>
                <div class="form-group">
                    <label for="description"> Description</label>
                    <textarea name="description" id="description" rows="10"><?php echo $UpdateHobby->description; ?></textarea>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="hobby[]" value="Playing" <?php if (in_array("Playing", $explodeUpdate)) echo "checked"; ?>> Playing </label>
                    <label><input type="checkbox" name="hobby[]" value="Coding" <?php if (in_array("Coding", $explodeUpdate)) echo "checked"; ?>> Coding </label>
                    <label><input type="checkbox" name="hobby[]" value="Reading" <?php if (in_array("Reading", $explodeUpdate)) echo "checked"; ?>> Reading </label>
                    <label><input type="checkbox" name="hobby[]" value="Gardening" <?php if (in_array("Gardening", $explodeUpdate)) echo "checked"; ?>> Gardening </label>
                    <label><input type="checkbox" name="hobby[]" value="Swimming" <?php if (in_array("Swimming", $explodeUpdate)) echo "checked"; ?>> Swimming </label>
                    <label><input type="checkbox" name="hobby[]" value="Chatting" <?php if (in_array("Chatting", $explodeUpdate)) echo "checked"; ?>> Chatting </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../../resource/assets/js/jquery-3.1.0.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/tinymce_4.4.0/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#description'
    });
</script>
</body>
</html>