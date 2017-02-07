<?php
/**
 * This admin page header includes all the HTML from <html> through <nav>, but 
 * not <container>. Note that it does not include <DOCTYPE>.
 */
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $pageTitle ?> - PAWS Administration</title>

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

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">PAWS Administration</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        foreach (array(
                                'index.php' => "Admin Home",
                                'user-list.php' => "Manage Users",
                                'petlisting-list.php' => "Manage Pet Listings")
                                as $url => $title) {
                            if ($url == basename($_SERVER['PHP_SELF'])) {
                                echo "<li class='active'><a href='$url'>$title<span class='sr-only'>(current)</span></a></li>";
                            } else {
                                echo "<li><a href='$url'>$title</a></li>";
                            }
                        }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><p class="navbar-text">Logged in as <?php echo $_SESSION['userEmail']; ?></p></li>
                        <li><a href="form-handlers/logout.php">Log out</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
