<!DOCTYPE html>



<!---header container-->
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <!--tital/img--->
                <div class="brand ">PAWS</div>
                
            </div>
            
            <dic class="col-lg-5 col-xsm-12 text-right">
                
                <!-- dropdown button -->
                <div class="dropdown-button">

                    <?php if (isset($_SESSION['loggedIn'])): ?>

                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default dropdown-toggle pull-right"
                                    data-toggle="dropdown">
                                Hello, <?php echo $_SESSION['userDisplayName']; ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><strike>Account Information</strike></a></li>
                                <li><a href="messages.html">Messages</a></li>
                                <li><a href="yourpets.html">Your Pets</a></li>
                                <li class="divider"></li>
                                <li><a href="form-handlers/logout.php">Sign Out</a></li>
                            </ul>
                        </div>

                    <?php else: ?>

                        <div class="btn-group pull-right">
                            <!--<button onclick="location.href = 'user-registration.php'" type="button" class="btn btn-default pull-right">
                                Register/Sign-In
                            </button>-->
			    <!--popup window for register/login-->
			    <?php include 'popup.php';?>
			    <a href="include/popup.php#signin" class="btn pull-right btn-primary btn-lg" data-toggle="modal" data-target="#myModal" role="button">SIGN-IN/REGISTER</a>
                        </div>

                    <?php endif; ?>
                    
                </div>
                <!-- end of dropdown button -->
            </dic>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="address-bar">SFSU Software Engineering </div>
            </div>
        </div>
    </div>
    <!---end header container-->
    
 