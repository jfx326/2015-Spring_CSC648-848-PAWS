<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PAWS-adoption</title>

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
                <div class="col-lg-12">
                    <h2 class="intro-text"><b>Adoption request form</b>
                    </h2>
                    <p><i>An asterisk(*) indicates a required field.</i></p>
                </div>
                <div class="panel-body">
                    <form action="thanks.php" role="form">
                        <!-- LINE 1 name -->
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <p class="col-sm-4 control-label"><b>Name<sup>*</sup>:</b></p>
                                
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="nameField">
                                </div>
                            </div>
                            
                        </div>
                        <!-- E-mail-->
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <p class="col-sm-4 control-label"><b>E-mail<sup>*</sup>:</b></p>
                                
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- LINE 3 phone-->
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <p class="col-sm-4 control-label"><b>Phone #<sup>*</sup>:</b></p>
                                
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone" id="phone">
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <!-- description -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p class="col-sm-4 control-label"><b>Please tell me about yourself</b></p>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="description" id="description" rows="8">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p class="col-sm-4 control-label"><b>Why are you a good match?</b></p>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="whyMatch" id="whyMatch" rows="8">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-right">SUBMIT</button>
                            </div>
                        </div>
                        
                        
                        <br>
                        
                        
                        
                    </form>
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
        interval: 5000 //changes the speed
    });
    </script>

</body>

</html>


