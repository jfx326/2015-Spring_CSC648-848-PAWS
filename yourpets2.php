<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Your Pets - PAWS</title>

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
			    <div class="col-lg-12 text-center">
                    <hr></hr>
                    <h1>Your Pets</h1>
                    <hr></hr>
                </div>
                
                <!--Add Pet Listing Button-->
                <div class="col-lg-12 text-center">
                    <button class="btn btn-primary btn-lg">Add Pet Listing</button>
                </div>
                <div class="col-lg-12">
                    <p></p>
                </div>
                <!--End Add Pet Listing Button-->
                
                <!--Image of Selected Pet + Pet Selector + Edit/Remove Listing-->
                <div class="col-md-5 text-center">
                    
                    <!--Image of Selected Pet-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img class="img-responsive" src="img/slide-1.jpg">
                        </div>
                    </div>
                    <!--End Image of Selected Pet-->
                    
                    <!--Pet Selector-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-sm-2">
                                <a class="glyphicon glyphicon-chevron-left" href="#"></a>
                            </div>
                            <div class="col-sm-2 text-center">
                                <a href="#"><img class="img-responsive" src="img/slide-1.jpg"></a>
                            </div>
                            <div class="col-sm-2 text-center">
                                <a href="#"><img class="img-responsive" src="img/slide-2.jpg"></a>
                            </div>
                            <div class="col-sm-2 text-center">
                                <a href="#"><img class="img-responsive" src="img/slide-3.jpg"></a>
                            </div>
                            <div class="col-sm-2 text-center">
                                <a href="#"><img class="img-responsive" src="img/dogs-img-sml.jpg"></a>
                            </div>
                            <div class="col-sm-2">
                                <a class="glyphicon glyphicon-chevron-right" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <!--End Pet Selector-->
                    
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
                
                <!--Forms-->
                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                            <!--Left Form-->
                            <form class="form-horizontal col-sm-6">
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Name</label>
                                    <div class="col-xs-8">
                                        <input class="form-control" type="text"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Species</label>
                                    <div class="col-sx-8">
                                        <label class="radio-inline">
                                            <input type="radio" name="species">Dog</input>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="species">Cat</input>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Breed</label>
                                    <div class="col-xs-8">
                                        <input class="form-control" type="text"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Sex</label>
                                    <div class="col-sx-8">
                                        <label class="radio-inline">
                                            <input type="radio" name="sex">Male</input>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex">Female</input>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Age</label>
                                    <div class="col-xs-8">
                                        <input class="form-control" type="number" min="1" max="50"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">ZIP Code</label>
                                    <div class="col-xs-8">
                                        <input class="form-control" type="number" min="94002" max="95497"></input>
                                    </div>
                                </div>
                            </form>
                            <!--End Left Form-->
                            
                            <!--Right Form-->
                            <form class="form-horizontal col-sm-6">
                                <div class="form-group">
                                    <label class="col-xs-8 control-label">Spayed/Neutered?</label>
                                    <div class="col-sx-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="spayed">Yes</input>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="spayed">No</input>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-8 control-label">Microchipped?</label>
                                    <div class="col-sx-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="chipped">Yes</input>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="chipped">No</input>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-8 control-label">Hypoallergenic?</label>
                                    <div class="col-sx-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="hypo">Yes</input>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="hypo">No</input>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-8 control-label">Declawed?</label>
                                    <div class="col-sx-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="declawed">Yes</input>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="declawed">No</input>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-8 control-label">Outdoor?</label>
                                    <div class="col-sx-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="outdoor">Yes</input>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="outdoor">No</input>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <!--End Right Form-->
                            
                            <!--Personality Traits + Description-->
                            <form class="form-horizontal col-sm-12">
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">Personality Traits</label>
                                    <div class="col-xs-8">
                                        <input class="form-control" type="text"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="6"></textarea>
                                </div>
                            </form>
                            <!--End Personality Traits + Description-->
                            
                        </div>
                    </div>
                </div>
                <!--End Forms-->
                
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