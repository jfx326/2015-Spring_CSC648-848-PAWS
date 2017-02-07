<?php
/**
 * Navigation bar - to be included just below <body> tag
 * 
 */
?>

<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">PAWS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="adoptionpage.php">Adopt A Pet</a>
                    </li>
                    <li>
                        <a href="pet-registration.php">Find Home For A Pet</a>
                    </li>
                    <li>
                        <a href="care.php">Pet Care</a>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>




  <!--
<div>

    <a href="index.php">PAWS Home</a> -

    <?php
    if (isset($_SESSION['login_user'])) {
        echo "<a href='logout.php'>Log out {$_SESSION['login_user']}</a>";
    } else {
        echo "<a href='login.php'>Log in</a>";
    }
    ?>

</div>
  --->

  <img id="logo" class="visible-sm-inline visible-md-inline visible-lg-inline" src="img/logo-med.png"/>
  <img id="logo-small" class="visible-xs-inline" src="img/logo-small.png"/>