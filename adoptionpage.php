<!DOCTYPE html>
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
            
            <div class="box col-sm-12">

                <p style="text-align: center">Who are you looking for?<br> 
                                               Choose by clicking one of the images below.</p>
                
                <div class="row">

                    <div class="col-sm-2"></div>

                    <!-- Adopt Cat -->
                    <div class="col-sm-4">
                        <div class="box">
                            <div style="text-align: center">
                                <a href="adoption-with-filter.php?species=cat">
                                    <img class="img-responsive img-full" src="img/cats-img-mid.JPG" >
                                    <br>

                                    <h2 class="intro-text text-center">
                                        Cats
                                    </h2>
                                    <br>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Adopt Dog --> 
                    <div class="col-sm-4">
                        <div class="box">
                            <div style="text-align: center">
                                <a href="adoption-with-filter.php?species=dog">
                                    <img class="img-responsive img-full" src="img/dogs-img-mid.JPG" >
                                    <br>

                                    <h2 class="intro-text text-center">
                                        Dogs
                                    </h2>
                                    <br>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2"></div>
               
                </div> <!-- /.row -->
                
            </div> <!-- /.col-sm-12 /.box -->

        </div> <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Before Adopting</strong>
                    </h2>
                    <hr>
                    
                    <hr class="visible-xs">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    
                </div>
            </div>
            
            
            <div class="col-lg-6">
                <div class="box">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Why Adopt</strong>
                    </h2>
                    <hr>
                    
                    <hr class="visible-xs">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    
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
    

</body>

</html>
