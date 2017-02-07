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

</head>

<body>
    
    <!--header and navigation bar-->
    <?php include './include/header.php';?>
    <?php include './include/navigation-bar.php';?>


    <div class="container">

        <div class="row">
            <div class="box">
                
                <!---separator--->
                <div class="col-lg-1">
                </div>
                
                <!---Left side of the first box-->
                <div class="col-lg-5 text-center">
                    <p>Pet of the Day</p>
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
                
                
                
                <!---Right side of the first box-->
                <div class="col-lg-5 text-center">
                    
                    <div>
                        
                        <p>Start Looking now</p>
                        <a href="adoption-with-filter.php?species=cat">
                            <img src="img/cats-img-sml.JPG">
                            <p>Cats</p>
                        </a>
                        
                        
                        <a href="adoption-with-filter.php?species=dog">
                            <img src="img/dogs-img-sml.JPG">
                            <p>Dogs</p>
                        </a>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Stories</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="img/intro-pic.JPG" alt="">
                    <hr class="visible-xs">
                    <p>Riley stole my heart when I saw him online. I was told that he was not the perfect dog and that he had issues in his short one and a half years of life, but he was the perfect dog for me! Our family loves him and life would not be the same without him! Not surprising to me, Riley graduated from obedience class with flying colors. Now more than a year later, he is the best companion, follows me everywhere and keeps me sane! My car decal paw print reads "Who rescued who!" I say, we both did.</p>
                    
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 9000 //changes the speed
    });
    </script>

</body>

</html>
