<?php
session_start();
include_once "../../../vendor/autoload.php";
use App\Bitm\SEIP128014\Birthday\Birthday;
use App\Bitm\SEIP128014\Book\Message;
$birthday = new Birthday();

if(array_key_exists('itemPerPage',$_SESSION)) {
    if (array_key_exists('itemPerPage', $_GET)) {
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
    }
}else{
    $_SESSION['itemPerPage']=5;
}

$itemPerPage=$_SESSION['itemPerPage'];
$totalItem=$birthday->count();
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
$bdData = $birthday->paginator($pageStartFrom,$itemPerPage);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Birth Day</title>

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
                <h2>Users Birth Date List</h2>

                <a class="btn btn-info" href="../../../index.php">Home Page</a>
                <a class="btn btn-success" href="create.php">Insert Your Birth Date</a>
                <a class="btn btn-success" href="pdf.php">Download As PDF</a>
                <a class="btn btn-success" href="excel.php">Download As Excel</a>
                <a class="btn btn-success" href="mail.php">Send Mail</a>
                <a class="btn btn-default" href="trashList.php">Trash List</a>
                <div id="message">
                    <?php
                    if( (array_key_exists('message',$_SESSION)) && ( !empty($_SESSION['message']) ) ) {
                        echo Message::message();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <form role="form" action="index.php" method="post">
                    <div class="form-group-sm form-inline">
                        <label for="title">Filter by Title:</label>
                        <input class="form-control" type="text" name="filterByTitle" value="" id="title">
                        <label  for="description">Filter by Description:</label>
                        <input class="form-control" type="text" name="filterByDescription" value="" id="description">
                        <button type="submit" class="btn-success btn" name="filter">Submit!</button>
                    </div>
                </form>
                <form role="form" action="index.php" method="get">
                    <div class="form-group-sm form-inline">
                        <label for="search">Search:</label>
                        <input class="form-control" type="text" name="search" value="" id="search">
                        <button class="btn btn-success" type="submit" name="search">Search</button>
                    </div>
                </form>
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
                            <th>Email</th>
                            <th >Description</th>
                            <th>Birth Date</th>
                            <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sl = 0;
                    foreach ($bdData as $bd){
                    $sl++;
                        $newDate = date("d/m/Y", strtotime($bd->bday));
                    ?>
                       <tr>
                           <td><?php echo $sl+$pageStartFrom; ?></td>
                           <td><?php echo $bd->id; ?></td>
                           <td><?php echo $bd->name; ?></td>
                           <td><?php echo $bd->email; ?></td>
                           <td><?php echo $bd->description; ?></td>
                           <td><?php echo $newDate; ?></td>
                           <td>
                               <a href="view.php?id=<?php echo $bd->id; ?>" class="btn btn-info">View</a>
                               <a href="edit.php?id=<?php echo $bd->id; ?>" class="btn btn-info">Update</a>
                               <a onclick="alertDelete()" href="delete.php?id=<?php echo $bd->id; ?>" class="btn btn-danger">Delete</a>
                               <a href="trash.php?id=<?php echo $bd->id; ?>" class="btn btn-warning">Trash</a>
                           </td>
                       </tr>
                    <?php }?>
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
<script type="text/javascript">
    jQuery("#message").show().delay(3000).fadeOut();
    function alertDelete(){
        confirm("Are You sure? You are deleting One Item.");
    }
</script>
</body>
</html>