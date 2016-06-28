<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Summary Create</title>
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
            <h2>Insert Your Data</h2>
          </div>
          <form class="form-horizontal" role="form" method="post" action="store.php">
            <div class="form-group">
              <label for="usr">Name:</label>
              <input type="text" name="name" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
              <label for="comment">Summary:</label>
              <textarea class="form-control" rows="3" name="summary" id="comment"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-info"/>
          </form>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>