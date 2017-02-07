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

    <title>About-PAWS</title>

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
            <div class="box">
                <div class="col-lg-4">
                    <img class="img-responsive" src="img/logo.png" alt="">
                </div>
                <div class="col-lg-8">
                    <h1 class="intro-text">About PAWS</h1>
                    <p>PAWS is all about user-friendliness, efficiency, ease, and swiftness in the adoption process. We believe that for all pet owners and pets of all ages, shapes, sizes, and walks of life, finding the next pet or home — the perfect pet or home — should be quick and simple. And when it's quick and simple, it's fun for all!</p>
                    <p>Conceived by five promising software engineers, under the guidance of Dragutin Petkovic, CEO, and Marc Sosnick, CTO, both from San Francisco State University, PAWS exclusively operates within the San Francisco Bay Area since 2015.</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 text-center">
                    <h1 class="intro-text">The PAWS Team</h1>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2 text-center">
                    <img class="img-responsive" src="img/profile/MaxProfilePic-200.jpg">
                    <h4>Maksim Shishkov</h3>
                    <h5>Team Lead, Front-End Development</h5>
                </div>
                <div class="col-md-2 text-center">
                    <img class="img-responsive" src="img/profile/BenProfilePic-200.jpg">
                    <h4>Ben Saylor</h4>
                    <h5>Technical Lead, Back-End Development</h5>
                </div>
                <div class="col-md-2 text-center">
                    <img class="img-responsive" src="img/profile/HowardProfilePic-200.jpg">
                    <h4>Howard Aben</h4>
                    <h5>SVN Administrator, Front-End Development</h5>
                </div>
                <div class="col-md-2 text-center">
                    <img class="img-responsive" src="img/profile/JeremyProfilePic-200.jpg">
                    <h4>Jeremy Brubaker</h4>
                    <h5>Back-End Development</h5>
                </div>
                <div class="col-md-2 text-center">
                    <img class="img-responsive" src="img/profile/JosephProfilePic-200.jpg">
                    <h4>Joseph Fernandez</h4>
                    <h5>Editor, Front-End Development</h5>
                </div>
                <div class="col-md-1"></div>
                <div class="clearfix"></div>
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
