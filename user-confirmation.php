<!DOCTYPE html>
<?php
session_name("PAWS_SESSION_ID");
session_start();
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

    <!-- redirects to home page in 15 seconds-->
    <meta http-equiv="refresh" content="15;url=index.html" />

</head>

<body>
    <!--header and navigation bar-->
    <?php include './include/header.php';?>
    <?php include './include/navigation-bar.php';?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
		    <h2 class="intro-text"><b>Confirmation</b></h2>
                    <p>Welcome! You are now a PAWS member! Please check your email to validate your account.<br></p>
                    <p><i>You will be redirected to the home page in <font color="red">15</font> seconds.</i><br></p>

                    <p>From here, you can click:<br></p>
                    <div class="row">
                        <form class="col-sm-2" action="adoptionpage.html">
                            <input type="submit" value="ADOPT A PET">
                        </form>
                        <p class="col-sm-4"> to search for pets looking for a new home.<br></p>
                    </div>
                    <p>     -or-<br></p>
                    <div class="row">
                        <form class="col-sm-2" action="pet-registration.html">
                            <input type="submit" value="FIND A HOME">
                        </form>
                        <p class="col-sm-4"> to find a new home for your pet.</p>
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

