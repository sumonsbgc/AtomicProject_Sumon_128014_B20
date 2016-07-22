<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\ProfilePicture\ProfilePicture;
use App\Bitm\SEIP128014\Book\Message;
$profile = new ProfilePicture();
$trashList = $profile->trashList();

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
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <form action="recoverMultiple.php" id="multiple" enctype="multipart/form-data" method="post">
                    <input type="submit" class="btn btn-info" value="Delete Permanently" id="delete">
                    <input type="submit" class="btn-success btn" value="Recover Multiple" id="recover">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Select Item</th>
                                <th>#SL</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Profile Image</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 0;
                            foreach ($trashList as $trash){
                                $sl++;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="mark[]" id="" value="<?php echo $trash->id;?>"></td>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $trash->id; ?></td>
                                    <td><?php echo $trash->name; ?></td>
                                    <td><img src="../../../resource/img/<?php echo $trash->image; ?>" alt="" width="200px" height="200px"></td>
                                    <td><?php echo $trash->email; ?></td>
                                    <td><?php echo $trash->description; ?></td>
                                    <td>
                                        <a href="view.php?id=<?php echo $trash->id; ?>" class="btn btn-info">View</a>
                                        <a href="delete.php?id=<?php echo $trash->id; ?>" class="btn btn-info">Delete</a>
                                    </td>
                                </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
<script>
    jQuery("#delete").on("click",function(){
        document.forms[0].action = "deleteMultiple.php";
        ("#multiple").submit()
    })
</script>
</body>
</html>
