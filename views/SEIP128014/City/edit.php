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
    <title>Create</title>
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
				<form role="form" action="update.php" method="post">
					<div class="form-group">
					    <input value="<?php echo $list->id; ?>" type="hidden" name="id">
					</div>
					<div class="form-group">
					    <label for="name">Email address</label>
					    <input value="<?php echo $list->name; ?>" type="text" name="name" class="form-control" id="name" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" class="form-control" id="email" value="<?php echo $list->email; ?>">
					</div>
					<div class="form-group">
						<label for="description"> Description</label>
						<textarea name="description" id="description" rows="10"><?php echo $list->description; ?></textarea>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Your City</label>
						<select class="form-control" name="city">
<option <?php if ($list->city == "Chittagong") { echo "selected"; }?>> Chittagong</option>
<option <?php if ($list->city == "Dhaka") { echo "selected"; } ?>> Dhaka</option>
<option <?php if ($list->city == "Rajshahi") { echo "selected"; } ?>> Rajshahi</option>
<option <?php if ($list->city == "Comilla") { echo "selected"; } ?>> Comilla</option>
<option <?php if ($list->city == "Barishal") { echo "selected"; } ?>> Barishal</option>
<option <?php if ($list->city == "Sylhet") { echo "selected"; } ?>> Sylhet</option>
<option <?php if ($list->city == "Dinajpur") { echo "selected"; } ?>> Dinajpur</option>
<option <?php if ($list->city == "Jessore") { echo "selected"; } ?> > Jessore</option>
						</select>
					</div>
					<input type="submit" name="submit" value="Submit" class="btn btn-default"/>
				</form>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../../../resource/assets/js/jquery-3.1.0.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../../resource/tinymce_4.4.0/tinymce/js/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: 'textarea#description'
		});
	</script>
  </body>
</html>