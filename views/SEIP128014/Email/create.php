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
                        <label for="pwd">Email:</label>
                        <input type="email" name="email" class="form-control" id="pwd">
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>