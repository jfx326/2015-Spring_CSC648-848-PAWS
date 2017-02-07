<!DOCTYPE html>

<?php
/**
 * Admin login page
 */

session_name("PAWS_SESSION_ID");
session_start();
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Log In - PAWS Administration</title>

        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <h1 class="text-center">PAWS Administration</h1>

            <div class="row">
                <div class="col-md-4"></div>

                    <div class="col-md-4">
                        <?php
                        if (isset($_SESSION['loginErrorMessage'])) {
                            echo "<div class='alert alert-danger' role='alert'>{$_SESSION['loginErrorMessage']}</div>";
                            unset($_SESSION['loginErrorMessage']);
                        }
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">Log In</h2>
                            </div>
                            <div class="panel-body">
                                <form action="form-handlers/login-submit.php" method="post">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                                    </div>
                                    <button type="submit" class="btn btn-default">Log In</button>
                                </form>
                            </div>
                        </div>
                    </div>

                <div class="col-md-4"></div>

            </div>

        </div> <!-- /.container -->

<?php include 'include/admin-page-footer.php'; ?>
