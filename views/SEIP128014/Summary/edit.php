<?php 
include_once("../../../vendor/autoload.php");
use App\Bitm\SEIP128014\Summary\Summary;
$summary = new Summary();
$summarySelectItem = $summary->prepare($_GET)->selectById();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Summary Update</title>
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
            <h2>Update Your Data</h2>
            <a href="index.php" class="btn btn-info">Index Page</a>
          </div>
          <form class="form-horizontal" method="post" role="form" action="update.php">
            <div class="form-group">
                <label for="name" control-label">Your Name</label>
                <input type="text" name="name" value="<?php echo $summarySelectItem->name; ?>" id="name" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $summarySelectItem->id; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" value="<?php echo $summarySelectItem->email; ?>">
            </div>
            <div class="form-group">
                <label for="description">Summary</label>
                <textarea class="form-control" rows="10" name="summary" id="description"><?php echo $summarySelectItem->summary; ?></textarea>
            </div>
            <input type="submit" name="submit" value="Update" class="btn btn-info"/>
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