<?php
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Summary\Summary;
use App\Bitm\SEIP128014\Book\Message;
$summary = new Summary();
$summarySingleItem = $summary->prepare($_GET)->selectById();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Summary List</title>
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
			<div class="col-lg-12">
				<div class="jumbotron">
					<div id="message">
						<?php echo Message::message(); ?>
					</div>
					<h2>Summary List</h2>
					<a href="create.php" class="btn btn-info">Add Summary</a>
					<a href="trashList.php" class="btn btn-info">Trash List</a>
					<a href="index.php" class="btn btn-info">Summary List</a>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-condensed table-striped table-rounded">
						<thead>
							<tr>
								<th>#SL</th>
								<th>ID</th>
								<th>Name</th>
								<th>Summary</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php $sl = 1; echo $sl; ?></td>
								<td><?php echo $summarySingleItem->id; ?></td>
								<td><?php echo $summarySingleItem->name ?></td>
								<td width="50%"><?php echo $summarySingleItem->summary; ?></td>
								<td>
									<a href="edit.php?id=<?php echo $summarySingleItem->id; ?>" class="btn btn-info">Update</a>
									<a href="delete.php?id=<?php echo $summarySingleItem->id; ?>" class="btn btn-info">Delete</a>
									<a href="trash.php?id=<?php echo $summarySingleItem->id; ?>" class="btn btn-info">Trash</a>
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
	<script type="text/javascript">
		jQuery("#message").show().delay(3000).fadeOut();
	</script>
  </body>
</html>