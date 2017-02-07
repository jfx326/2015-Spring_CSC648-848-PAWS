<!DOCTYPE html>
<?php
session_name("PAWS_SESSION_ID");
session_start();
require_once 'models/RegisteredUser.php';
?>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PAWS</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-casual.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <!--header and navigation bar-->
        <?php include './include/header.php';?>
        <?php include './include/navigation-bar.php';?>

        <div class="container">
            <div class="row">

                <!-- left side: register -->
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-lg-12 box">
                            <h2 class="intro-text"><b>Register</b></h2>
                            <p><font color="blue"><i>You must be registered to adopt or to find a home for a pet.</i></font></p>
                            <p>Give a pet a new home!</p>
                            <!-- Registration Error Message -->
                            <?php
                            if( isset($_SESSION['errormsg']) ) {
                                echo "<div class='alert alert-danger' role='alert'>{$_SESSION['errormsg']}</div>";
                                unset($_SESSION['errormsg']);
                            }
                            ?>
                            <form action="form-handlers/save-user.php" role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <p class="col-sm-5"><b>Email Address:</b></p>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-5"><b>Display Name:</b></p>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="displayName" name="displayName">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-5"><b>Password:</b></p>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-5"><b>Confirm Password:</b></p>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="password2" name="password2">
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">I agree to the PAWS 
                                        <a href="#">Terms of Service</a> and 
                                        <a href="#">Privacy Policy</a>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success pull-right">REGISTER</button>
                            </form>
                        </div> <!-- /.col-sm-12 .box -->
                    </div> <!-- /.row -->
                </div> <!-- /.col-sm-6 -->

                <!-- right side: sign in -->
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-lg-1"></div> <!-- spacer -->
                        <div class="col-lg-11 box">
                            <h2 class="intro-text"><b>Sign In</b></h2>
                            <?php
                            if (isset($_SESSION['loginErrorMessage'])) {
                                echo "<div class='alert alert-danger' role='alert'>{$_SESSION['loginErrorMessage']}</div>";
                                unset($_SESSION['loginErrorMessage']);
                            } else {
                                echo '<p>Welcome back!</p>';
                            }
                            ?>
                            <form action="form-handlers/login-submit.php" role="form" method="post">
                                <div class="form-group row">
                                    <p class="col-sm-5"><b>Email Address:</b></p>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <p class="col-sm-5"><b>Password:</b></p>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right"><b>SIGN IN</b></button>
                                <!--<p>Forgot your password? <a href="reset-password-form.php">Click here to reset it.</a></p>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

        <?php include './include/footer.php';?>

        <!-- jQuery Version 1.11.0 -->
        <script src="js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
