<!DOCTYPE html>

<?php
require_once 'models/PetListing.php';

const LISTINGS_PER_ROW = 3;

if (isset($_GET['deSexed']) && $_GET['deSexed'] == '-1') {
    unset($_GET['deSexed']);
}

if (isset($_GET['microchipped']) && $_GET['microchipped'] == '-1') {
    unset($_GET['microchipped']);
}

$listings = PetListing::$objects->filter($_GET, 1000, 1, 'name');

$numRows = ceil(count($listings) / LISTINGS_PER_ROW);
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

            <div class="row box">

                <!---leftside, filter -->
                <div class="col-lg-3">
                    <div class="filters">
                        <h2 class="brand-before"><small>Filters</small></h2>
                        
                        <form method="get">
                            
                            <input type="hidden" name="species" value="<?php echo $_GET['species']; ?>"/>
                            
                            <table class="table">
                                <tr>
                                    <th>Neutered/Spayed</th>
                                    <td>
                                        <input type="radio" name="deSexed" value="1"
                                        <?php if (isset($_GET['deSexed']) && $_GET['deSexed'] == 1) echo 'checked="checked"'; ?>
                                               /> Yes
                                        <br/>
                                        <input type="radio" name="deSexed" value="0"
                                        <?php if (isset($_GET['deSexed']) && $_GET['deSexed'] == 0) echo 'checked="checked"'; ?>
                                               /> No
                                        <br/>
                                        <input type="radio" name="deSexed" value="-1"
                                        <?php if (!isset($_GET['deSexed']))echo 'checked="checked"'; ?>
                                               /> Unspecified
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Microchipped</th>
                                    <td>
                                        <input type="radio" name="microchipped" value="1"
                                        <?php if (isset($_GET['microchipped']) && $_GET['microchipped'] == 1) echo 'checked="checked"'; ?>
                                               /> Yes
                                        <br/>
                                        <input type="radio" name="microchipped" value="0"
                                        <?php if (isset($_GET['microchipped']) && $_GET['microchipped'] == 0) echo 'checked="checked"'; ?>
                                               /> No
                                        <br/>
                                        <input type="radio" name="microchipped" value="-1"
                                        <?php if (!isset($_GET['microchipped'])) echo 'checked="checked"'; ?>
                                               /> Unspecified

                                    </td>
                                </tr>

                            </table>
                            
                            
                            
                            <input type="submit" value="Apply Filters"/>
                        </form>
                    </div>
                </div>

                <!---rightside,petlistings--->
                <div class="col-lg-9">

                    <?php
                    for ($row = 0; $row < $numRows; $row++) {
                        echo '<div class="row">';
                        for ($col = 0; $col < LISTINGS_PER_ROW; $col++) {
                            $i = $row * LISTINGS_PER_ROW + $col;
                            if ($i >= count($listings)) {
                                break;
                            }
                            $listing = $listings[$i];
                            ?>
                            <div class = "col-lg-4">
                                <div class="box">
                                    <div class="text-center" style="height: 200px">
                                        <a href="<?php echo "petlisting.php?id=$listing->id" ?>">
                                            <img class="img-responsive img-full" src="<?php echo $listing->getThumbnailURL() ?>"/>
                                            <p><?php echo $listing->name; ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                    ?>

                </div> <!-- /.col-lg-9 -->

            </div> <!-- /.row -->

        </div> <!-- /.container -->

        <?php include './include/footer.php';?>

        <!-- jQuery Version 1.11.0 -->
        <script src="js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Script to Activate the Carousel -->


    </body>

</html>
