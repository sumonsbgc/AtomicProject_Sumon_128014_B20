<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Email Subscription</title>
        <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../../resource/bootstrap/js/bootstrap.js">
    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form role="form" action="store.php" method="post">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="email" name="email" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="10"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
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