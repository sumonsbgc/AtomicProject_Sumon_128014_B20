<?php
session_start();
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\City\City;
use App\Bitm\SEIP128014\Book\Message;
$city = new City();

$allName = $city->allName();
$commaSeparated= implode('","',$allName);

$allSummary = $city->allSummary();
$commaSeparatedSummary = implode('","',$allSummary);



if(array_key_exists('itemPerPage',$_SESSION)) {
	if (array_key_exists('itemPerPage', $_GET)) {
		$_SESSION['itemPerPage'] = $_GET['itemPerPage'];
	}
}else{
	$_SESSION['itemPerPage']=5;
}

$itemPerPage=$_SESSION['itemPerPage'];
$totalItem=$city->count();
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
if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) {
	$cityList = $city->paginator($pageStartFrom,$itemPerPage);
}
if(strtoupper($_SERVER['REQUEST_METHOD']=='POST')) {
	$cityList = $city->prepare($_POST)->selectAll();
}
if(strtoupper(($_SERVER['REQUEST_METHOD']=='GET')) && isset($_GET['search'])) {
	$cityList = $city->prepare($_GET)->selectAll();

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>City List</title>
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
					<a class="btn btn-info" href="../../../index.php">Home Page</a>
					<a href="create.php" class="btn btn-info">Add City</a>
					<a class="btn btn-success" href="pdf.php">Download As PDF</a>
					<a class="btn btn-success" href="excel.php">Download As Excel</a>
					<a class="btn btn-success" href="mail.php">Send Mail</a>
					<a href="trashList.php" class="btn btn-info">Trash List</a>
					<h2>Insert Your City Name</h2>
					<div id="message">
						<?php

						if( (array_key_exists('message',$_SESSION)) && ( !empty($_SESSION['message']) ) ) {
							echo Message::message();
						}
							
						?>
					</div>
				</div>

				<div class="jumbotron">
					<form role="form" action="index.php" method="post">
						<div class="form-group-sm form-inline">
							<label for="title">Filter by Title:</label>
							<input class="form-control" type="text" name="filterByTitle" value="" id="title">
							<label  for="summary">Filter by Description:</label>
							<input class="form-control" type="text" name="filterByDescription" value="" id="summary">
							<button type="submit" class="btn-success btn">Submit!</button>
						</div>
					</form>
					<form role="form" action="index.php" method="get">
						<div class="form-group-sm form-inline">
							<label for="search">Search:</label>
							<input class="form-control" type="text" name="search" value="" id="search">
							<button class="btn btn-success" type="submit">Search</button>
						</div>
					</form>
				</div>

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
					<table class="table table-bordered table-striped table-bordered table-condensed">
						<thead>
							<tr>
								<th>#SL</th>
								<th>ID</th>
								<th>Name</th>
								<th>City Name</th>
								<th>Email</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $sl=0; foreach( $cityList as $list ) { $sl++; ?>
							<tr>
								<td><?php echo $sl+$pageStartFrom; ?></td>
								<td><?php echo $list->id; ?></td>
								<td><?php echo $list->name; ?></td>
								<td><?php echo $list->city; ?></td>
								<td><?php echo $list->email; ?></td>
								<td><?php echo $list->description; ?></td>
								<td>
									<a href="view.php?id=<?php echo $list->id; ?>" class="btn btn-info">Views</a>
									<a href="edit.php?id=<?php echo $list->id; ?>" class="btn btn-success">Update</a>
									<a href="delete.php?id=<?php echo $list->id; ?>" class="btn btn-warning">Delete</a>
									<a href="trash.php?id=<?php echo $list->id; ?>" class="btn btn-danger">Trash</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<?php if((strtoupper($_SERVER['REQUEST_METHOD']=='GET'))&&(empty($_GET['search']))) { ?>
				<ul class="pagination">
					<?php if( $pageNumber > 1 ): ?>
						<li><a href="index.php?pageNumber=<?php $prev = $pageNumber-1; echo $prev; ?>">Prev</a></li>
					<?php endif; ?>

					<?php echo $pagination; ?>

					<?php  if( $pageNumber < $totalPage ): ?>
						<li><a href="index.php?pageNumber=<?php $next = $pageNumber+1; echo $next;?>">Next</a></li>
					<?php endif; ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

	<script>
  		jQuery("#message").show().delay(3000).fadeOut();
  	</script>
	<script>
		$( function() {
			var name = [ <?php echo '"'.$commaSeparated.'"'; ?> ];
			var summary = [ <?php echo '"'.$commaSeparatedSummary.'"'; ?> ];
			var allSummary = [ <?php echo '"'.$commaSeparated.' '.$commaSeparatedSummary.'"'?>];

			$( "#title" ).autocomplete({
				source: name
			});

			$("#summary").autocomplete({
				source: summary
			});

			$("#search").autocomplete({
				source: allSummary
			})
		} );
	</script>
  </body>
</html>