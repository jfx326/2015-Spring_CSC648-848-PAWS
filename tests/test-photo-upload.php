<!DOCTYPE html>
<?php session_start();
require_once __DIR__ . '/../models/Photo.php';

/**
 * Used for testing the Photo manager.
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title>Photo Upload Test</title>
    </head>


    <body>
        <div class="container">

            <!-- Photo Upload -->
            <div class="col-md-6">
                <div class="jumbotron">
                    <h2>Test Photo Upload</h2>
                    <form class="form-inline" action="test-photo-upload-submit.php" method="post" enctype="multipart/form-data">
                        <label>
                            petListingId:
                            <input type="text" name="petListingId"/>
                        </label>
                        <br/>
                        <label>
                            Image file:
                            <input type="file" name="file_to_upload" id="file_to_upload">
                        </label><br>
                        <label for="caption">Caption:</label>
                        <input type="text" class="form-control" name="caption"placeholder="Caption for file" />
                        <input class="btn btn-default" type="submit" value="Upload Image" name="submit">
                    </form>
                </div>
            </div>

        </div> <!-- /.container -->
    </body>
</html>
