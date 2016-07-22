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
				<form method="post" role="form" action="store.php" >
					<div class="form-group">
					    <label for="exampleInputEmail1">Name :</label>
					    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="email">Email :</label>
						<input type="text" name="email" class="form-control" id="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="description"> Description</label>
						<textarea name="description" id="description" rows="10"></textarea>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Your City</label>
						<select class="form-control" name="city">
						  <option>Chittagong</option>
						  <option>Dhaka</option>
						  <option>Rajshahi</option>
						  <option>Comilla</option>
						  <option>Barishal</option>
						  <option>Sylhet</option>
						  <option>Dinajpur</option>
						  <option>Jessore</option>
						</select>
					</div>
					<input type="submit" name="submit" class="btn btn-default">
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

	