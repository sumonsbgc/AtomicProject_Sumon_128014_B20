<?php
include_once "../../../vendor/autoload.php";

use App\Bitm\SEIP128014\Email\Email;
$email = new Email();
$trashItem = $email->trashList();
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
                <a class="btn btn-info" href="index.php">Index Page</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <form action="recoverMultiple.php" method="post" id="multiple">
                    <input type="submit" name="deleteMultiple" class="btn btn-warning" value="Delete Multiple" id="delete">
                    <input type="submit" name="recoverMultiple" class="btn btn-info" value="Recover Multiple">
                    <table class="table table-bordered table-striped">
                        <thead>
                           <tr>
                               <th>Item Check</th>
                               <th>#SL</th>
                               <th>ID</th>
                               <th>Email</th>
                               <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                       <?php $sl = 0; foreach ( $trashItem as $item) { $sl++;?>
                           <tr>
                               <td><input type="checkbox" name="mark[]" value="<?php echo $item->id;?>"></td>
                               <td><?php echo $sl; ?></td>
                               <td><?php echo $item->id; ?></td>
                               <td><?php echo $item->email; ?></td>
                               <td>
                                   <a class="btn btn-warning" href="delete.php?id=<?php echo $item->id; ?>">Delete</a>
                                   <a class="btn btn-info" href="recover.php?id=<?php echo $item->id; ?>">Recover</a>
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
    jQuery('#delete').on('click',function(){
        document.forms[0].action = 'deleteMultiple.php';
        ('#multiple').submit();
    })
</script>
</body>
</html>
