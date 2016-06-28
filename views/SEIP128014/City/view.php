<?php
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\City\City;
$city = new City();
$list = $city->prepare($_GET)->selectById();
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
					<a href="index.php" class="btn btn-info">Index Page</a>
					<h2>Insert Your City Name</h2>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-bordered table-condensed">
						<thead>
							<tr>
								<th>#SL</th>
								<th>ID</th>
								<th>Name</th>
								<th>City Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php $sl=1; echo $sl; ?></td>
								<td><?php echo $list->id; ?></td>
								<td><?php echo $list->name; ?></td>
								<td><?php echo $list->city; ?></td>
								<td>
									<a href="edit.php?id=<?php echo $list->id; ?>" class="btn btn-success">Update</a>
									<a href="delete.php?id=<?php echo $list->id; ?>" class="btn btn-warning">Delete</a>
									<a href="delete.php?id=<?php echo $list->id; ?>" class="btn btn-danger">Trash</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>