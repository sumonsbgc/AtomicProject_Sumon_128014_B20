<?php
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Gender\Gender;
$gender = new Gender();
$trashList = $gender->trashList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trash List</title>
    <!-- Bootstrap -->
    <link href="../../../resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-log-12">
            <div class="jumbotron">
                <a href="create.php" class="btn btn-info">Select Gender</a>
                <a href="trashList.php" class="btn btn-info">Trash List</a>
                <a href="index.php" class="btn btn-info">Index Page</a>
                <h2>Gender Trash List</h2>
            </div>
            <div class="table-responsive">
                <form action="recoverMultiple.php" method="post" id="multiple">
                    <div class="form-group">
                        <input class="btn btn-info" type="submit" name="submit" value="Recover Multiple" id="recover">
                        <input class="btn btn-danger" type="submit" name="submit" value="Delete Multiple" id="delete">
                    </div>
                    <table class="table table-bordered table-striped table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>Select</th>
                            <th>#SL</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sl=0; foreach( $trashList as $list ) { $sl++; ?>
                            <tr>
                                <td><input type="checkbox" name="mark[]" value="<?php echo $list->id; ?>"></td>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $list->id; ?></td>
                                <td><?php echo $list->name; ?></td>
                                <td><?php echo $list->gender; ?></td>
                                <td>
                                    <a href="delete.php?id=<?php echo $list->id; ?>" class="btn btn-warning">Delete</a>
                                    <a href="recover.php?id=<?php echo $list->id; ?>" class="btn btn-info">Recover</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
<script>
    jQuery("#delete").on('click',function(){
        document.forms[0].action = "deleteMultiple.php";
        jQuery("#multiple").submit()
    })
</script>
</body>
</html>