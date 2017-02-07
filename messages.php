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

    <!-- My Custom CSS -->
    <link href="css/accordion.css" rel="stylesheet">

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
                    <h2 class="intro-text">Messages
                    </h2>
                    <div class="accordion vertical">
                        <ul>
                            <!-- start of message -->
                            <li>
                                <input type="radio" id="radio-1" name="radio-accordion" checked="checked" />
                                <label for="radio-1">Subject: Interested party
                                    <button type="submit" class="btn btn-default pull-right">Delete</button>
                                </label>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <p><b>Body</b></p>
                                        </div>
                                        <div class="col-sm-5">
                                            <a><font size="4">Lassie</font></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>
                                        <div class="col-sm-5">
                                            <img src="img/dog1-small.jpg" alt="dog1-small">
                                        </div>
                                    </div>
                                    <hr>
                                    <p><b>Reply:</b></p>
                                    <form role="form">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="inputReply" rows="8">
                                                </textarea>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success pull-right">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <!-- end of message -->
                            <li>
                                <input type="radio" id="radio-2" name="radio-accordion" />
                                <label for="radio-2">Subject: Interested party
                                    <button type="submit" class="btn btn-default pull-right">Delete</button>
                                </label>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <p><b>Body</b></p>
                                        </div>
                                        <div class="col-sm-5">
                                            <a><font size="4">Lassie</font></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>
                                        <div class="col-sm-5">
                                            <img src="img/dog1-small.jpg" alt="dog1-small">
                                        </div>
                                    </div>
                                    <hr>
                                    <p><b>Reply:</b></p>
                                    <form role="form">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="inputReply" rows="8">
                                                </textarea>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success pull-right">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <!-- end of message -->
                        </ul>
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>

