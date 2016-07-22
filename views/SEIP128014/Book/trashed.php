<?php
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Book\Book;

$book = new Book();
$trashItem = $book->trashed();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trashed List</title>
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
        <div class="col-lg-12 col-md-12">
            <div class="jumbotron">
                <h2>Trash Item</h2>
                <span><a href="index.php" class="btn btn-info">Back Home Page</a></span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="recoverMultiple.php" method="post" id="multiple">
                <button class="btn btn-danger" id="delete" type="submit">Delete Selected Item</button>
                <button class="btn btn-success" id="recover" type="submit">Recover Selected Item</button>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Select Item</th>
                                <th>SL No</th>
                                <th>ID</th>
                                <th>Book Title</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sl = 0;
                        foreach($trashItem as $trash){ $sl++;
                        ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="mark[]" value="<?php echo $trash->id; ?>" />
                                </td>
                                <td><?php echo $sl?></td>
                                <td><?php echo $trash->id; ?></td>
                                <td><?php echo $trash->title; ?></td>
                                <td><?php echo $trash->email; ?></td>
                                <td><?php echo $trash->description; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="delete.php?id=<?php echo $trash->id; ?>">Delete</a>
                                    <a class="btn btn-info" href="recover.php?id=<?php echo $trash->id; ?>">Recover</a>
                                </td>
                            </tr>
                        <?php }?>
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
<script>
    jQuery('#delete').on('click',function(){
        document.forms[0].action = 'deleteMultiple.php';
        ('#multiple').submit();
    })
</script>
</body>
</html>
