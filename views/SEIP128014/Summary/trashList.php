<?php 
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Summary\Summary;
$summary = new Summary();
$summaryTrashItem = $summary->trashList();
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
					<h2>Summary List</h2>
					<a href="create.php" class="btn btn-info">Add Summary</a>
					<a href="index.php" class="btn btn-info">Summary List</a>
				</div>
				<div class="table-responsive">
					<form action="recoverMultiple.php" method="post" id="multiple">
						<input class="btn btn-success" type="submit" value="Recover Multiple" name="submit" id="recover">
						<input class="btn btn-danger" type="submit" value="Delete Multiple" name="submit" id="delete">
					<table class="table table-bordered table-condensed table-striped table-rounded">
						<thead>
							<tr>
								<th>Select Item</th>
								<th>#SL</th>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Summary</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $sl= 0; foreach($summaryTrashItem as $trash) { $sl++; ?>
							<tr>
								<td><input type="checkbox" name="mark[]" value="<?php echo $trash->id; ?>" ?></td>
								<td><?php echo $sl; ?></td>
								<td><?php echo $trash->id; ?></td>
								<td><?php echo $trash->name ?></td>
								<td><?php echo $trash->email ?></td>
								<td width="50%"><?php echo $trash->summary; ?></td>
								<td>
									<a href="delete.php?id=<?php echo $trash->id; ?>" class="btn btn-info">Delete</a>
									<a href="recover.php?id=<?php echo $trash->id; ?>" class="btn btn-info">Recover</a>
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
		jQuery("#delete").on("click",function(){
			document.forms[0].action = "deleteMultiple.php";
			jQuery("#multiple").submit();
		})
	</script>
  </body>
</html>