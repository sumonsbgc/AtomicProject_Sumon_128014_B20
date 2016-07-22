<?php
session_start();
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\ProfilePicture\ProfilePicture;
use App\Bitm\SEIP128014\Book\Message;
$profile = new ProfilePicture();

if(array_key_exists('itemPerPage',$_SESSION)) {
    if (array_key_exists('itemPerPage', $_GET)) {
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
    }
}else{
    $_SESSION['itemPerPage']=5;
}

$itemPerPage=$_SESSION['itemPerPage'];
$totalItem=$profile->count();
$totalPage = ceil($totalItem/$itemPerPage);

$pagination = "";

if(array_key_exists('pageNumber',$_GET)){
    $pageNumber = $_GET['pageNumber'];
}else{
    $pageNumber = 1;
}

for($i=1; $i<=$totalPage; $i++){
    $class = ($i==$pageNumber)? "active" : "";
    $pagination.="<li class='$class'><a href='index.php?pageNumber=$i'>$i</a></li>";
}

$pageStartFrom = $itemPerPage*($pageNumber-1);
$image = $profile->paginator($pageStartFrom,$itemPerPage);

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
                <a class="btn btn-info" href="../../../index.php">Home Page</a>
                <a href="create.php" class="btn btn-info">Insert Your Profile Image</a>
                <a href="trashList.php" class="btn btn-info">Trash List</a>
                <div id="message">
                    <p>
                        <?php
                        if( (array_key_exists('message',$_SESSION)) && ( !empty($_SESSION['message']) ) ) {
                            echo Message::message();
                        }
                      ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="floatLeft">
                <div class="form-group">
                    <form role="form" action="">
                        <label for="sel1">Select list:</label>
                        <select class="form-control" id="sel1" name="itemPerPage">
                            <option <?php if($itemPerPage == 5){echo "selected"; } ?>>5</option>
                            <option <?php if($itemPerPage == 10 ){ echo "selected"; } ?>>10</option>
                            <option <?php if($itemPerPage == 15){echo "selected"; } ?>>15</option>
                            <option <?php if($itemPerPage==20){echo "selected"; } ?>>20</option>
                        </select>
                        <input class="btn btn-default" type="submit" value="Submit" name="submit">
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
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
                        foreach ($image as $img){
                         $sl++;
                    ?>
                    <tr>
                        <td><?php echo $sl+$pageStartFrom; ?></td>
                        <td><?php echo $img->id; ?></td>
                        <td><?php echo $img->name; ?></td>
                        <td><img src="../../../resource/img/<?php echo $img->image; ?>" alt="" width="200px" height="200px"></td>
                        <td><?php echo $img->email; ?></td>
                        <td><?php echo $img->description; ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $img->id; ?>" class="btn btn-info">View</a>
                            <a href="edit.php?id=<?php echo $img->id; ?>" class="btn btn-info">Update</a>
                            <a href="delete.php?id=<?php echo $img->id; ?>" class="btn btn-info">Delete</a>
                            <a href="trash.php?id=<?php echo $img->id; ?>" class="btn btn-info">Trash</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <ul class="pagination">
                <?php if( $pageNumber > 1 ): ?>
                    <li><a href="index.php?pageNumber=<?php $prev = $pageNumber-1; echo $prev; ?>">Prev</a></li>
                <?php endif; ?>

                <?php echo $pagination; ?>

                <?php  if( $pageNumber < $totalPage ): ?>
                    <li><a href="index.php?pageNumber=<?php $next = $pageNumber+1; echo $next;?>">Next</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
<script>
    jQuery('#message').show().delay(3000).fadeOut();
</script>
</body>
</html>
