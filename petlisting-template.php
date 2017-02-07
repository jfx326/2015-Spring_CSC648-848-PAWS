<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pet Name - PAWS</title>

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
                <!--Image of Pet + Pet Image Selector-->
                <div class="col-md-5 text-center">
                    
                    <!--Image of Pet-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img class="img-responsive" src="img/slide-1.jpg">
                        </div>
                    </div>
                    <!--End Image of Pet-->
                    
                    <!--Pet Image Selector-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-sm-3 text-center">
                                <a href="#"><img class="img-responsive" src="img/slide-1.jpg"></a>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a href="#"><img class="img-responsive" src="img/slide-1.jpg"></a>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a href="#"><img class="img-responsive" src="img/slide-1.jpg"></a>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a href="#"><img class="img-responsive" src="img/slide-1.jpg"></a>
                            </div>
                        </div>
                    </div>
                    <!--End Pet Image Selector-->
                    
                    <!--PHP here-->
                    <!--Edit/Remove Listing-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button class="btn btn-default btn-lg col-sm-12" type="button">Edit Information</button>
                            <div class="col-sm-12">
                                <p></p>
                            </div>
                            <button class="btn btn-danger btn-lg col-sm-12" type="button">Remove Pet Listing</button>
                        </div>
                    </div>
                    <!--End Edit/Remove Listing-->
                </div>
                
                <!--Pet Info-->
                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                            <!--Basic Info-->
                            <div class="col-sm-7">
                                <h2>Pet Name</h2>
                                <p class="col-xs-4 text-left"><strong>Species:</strong></p>
                                <p class="col-xs-8 text-left">Cat</p>
                                <p class="col-xs-4 text-left"><strong>Breed:</strong></p>
                                <p class="col-xs-8 text-left">Breed</p>
                                <p class="col-xs-4 text-left"><strong>Sex:</strong></p>
                                <p class="col-xs-8 text-left">Sex</p>
                                <p class="col-xs-4 text-left"><strong>Age:</strong></p>
                                <p class="col-xs-8 text-left">Age</p>
                            </div>
                            <!--End Basic Info-->
                            
                            <!--Adopt + Favorite-->
                            <div class="col-sm-5">
                                <button class="btn btn-success btn-lg col-sm-12" type="button">Adopt!</button>
                                <div class="col-sm-12">
                                    <p></p>
                                </div>
                            </div>
                            <!--End Adopt + Favorite-->
                            
                            <!--Personality Traits + Description-->
                            <div class="col-sm-12">
                                <hr></hr>
                                <h2>About</h2>
                                <p><strong>Description</strong></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pharetra feugiat nulla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis at lacinia odio. Quisque sagittis mauris felis, et suscipit magna aliquam eget. Etiam non elementum urna, sit amet sodales urna. In placerat nisi vel posuere maximus. Fusce pellentesque neque metus, quis scelerisque ante faucibus iaculis. Nulla accumsan elit velit, quis hendrerit quam cursus quis. Nunc tortor dolor, auctor ut euismod a, bibendum sed leo. Sed sollicitudin sapien nec tristique finibus. Integer tellus nisi, faucibus et porta sed, aliquam quis turpis. Maecenas aliquam euismod ligula eget consectetur.</p>
                                <p><strong>Personality Traits</strong></p>
                                <p>Trait 1, Trait 2, Trait 3, ...
                            </div>
                            <!--End Personality Traits + Description-->
                            
                        </div>
                    </div>
                </div>
                <!--End Pet Info-->
                
            </div>
        </div>
    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>&copy; 2015. SFSU/FAU/Fulda Software Engineering Project, Spring 2015. For Demonstration Only.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>