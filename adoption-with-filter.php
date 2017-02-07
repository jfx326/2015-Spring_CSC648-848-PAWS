<!DOCTYPE html>

<?php
session_name("PAWS_SESSION_ID");
session_start();
require_once 'models/PetListing.php';

const LISTINGS_PER_ROW = 3;

$pageNum = filter_input(INPUT_GET, 'pageNum', FILTER_VALIDATE_INT,
        array('options' => array('default' => 1)));
unset($_GET['pageNum']);
$criteria = $_GET;

if (isset($_GET['species'])) {
    $species = $_GET['species'];
} else {
    $species = 'cat';
}

if (isset($criteria['age']) && $criteria['age'] == '-1') {
    unset($criteria['age']);
}

if (isset($criteria['deSexed']) && $criteria['deSexed'] == '-1') {
    unset($criteria['deSexed']);
}

if (empty($criteria['zip'])) {
    unset($criteria['zip']);
}

$criteria['approved'] = 1;

$listings = PetListing::$objects->filter($criteria, 9, $pageNum, 'name');

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
        <link href="css/paws.css" rel="stylesheet">

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
                    
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Filter Results</h4>
                        </div>
                        <div class="panel-body">

                            <form method="get">
                                
                                <input type="hidden" name="species" value="<?php echo $_GET['species']; ?>"/>
                            
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <select name="age" id="age" class="form-control">
                                        <option value="-1">All</option>
                                        <?php
                                        foreach (PetListing::$ageCategories as $ageCategory) {
                                            $selected = (isset($_GET['age']) && $_GET['age'] == $ageCategory) ? 'selected' : '';
                                            echo "<option $selected>$ageCategory</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="deSexed">Neutered/Spayed</label>
                                    <select name="deSexed" id="deSexed" class="form-control">
                                        <option value="-1">All</option>
                                        <option value="1" <?php if (isset($_GET['deSexed']) && $_GET['deSexed'] === '1') echo 'selected'; ?>>
                                            Only neutered/spayed</option>
                                        <option value="0" <?php if (isset($_GET['deSexed']) && $_GET['deSexed'] === '0') echo 'selected'; ?>>
                                            Exclude neutered/spayed</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="zip">ZIP code</label>
                                    <input name="zip" id="zip" class="form-control" type="number" min="90001" max="96162"
                                            <?php if (isset($criteria['zip'])) { echo "value={$criteria['zip']}"; } ?>
                                        />
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="microchipped" value="1"
                                            <?php if (isset($_GET['microchipped']) && $_GET['microchipped'] === '1') echo 'checked="checked"'; ?>>
                                        Only microchipped
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="hypoallergenic" value="1"
                                            <?php if (isset($_GET['hypoallergenic']) && $_GET['hypoallergenic'] === '1') echo 'checked="checked"'; ?>>
                                        Only hypoallergenic
                                    </label>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Apply Filters</button>
                                </div>
                            </form>
                        </div> <!-- /.panel-body -->
                    </div> <!-- /.panel -->
                </div>

                <!---rightside,petlistings--->
                <div class="col-lg-9">

                    <?php
                    $catsLink = '<a href="?species=cat">Cats</a>';
                    $dogsLink = '<a href="?species=dog">Dogs</a>';
                    $otherLink = '<a href="?species=other">Other Pets</a>';

                    echo "<h1 class='no-top-margin'>";
                    if ($species == 'cat') {
                        echo "Cats <small>&mdash; $dogsLink &mdash; $otherLink</small>";
                    } elseif ($species == 'dog') {
                        echo "Dogs <small>&mdash; $catsLink &mdash; $otherLink</small>";
                    } elseif ($species == 'other') {
                        echo "Other Pets <small>&mdash; $catsLink &mdash; $dogsLink</small>";
                    }
                    echo "</h1>";

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
                                <div class="panel">
                                    <div class="panel-body">
                                        <a href="<?php echo "petlisting.php?id=$listing->id" ?>">
                                            <img class="img-responsive img-thumbnail" src="<?php echo $listing->getThumbnailURL() ?>"/>
                                            <p><strong><?php echo $listing->name ?></strong></p>
                                        </a>
                                        <p><?php echo $listing->age . " " . ($listing->sex == 'M' ? "Male" : "Female") ?></p>
                                        <p>ZIP Code: <?php echo $listing->zip ?></p>
                                        <p>
                                            <?php
                                            if (strlen($listing->description) > 100) {
                                                echo substr_replace($listing->description, '...', 100);
                                            } else {
                                                echo $listing->description;
                                            }
                                            ?>
                                            <a href="<?php echo "petlisting.php?id=$listing->id" ?>">More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p>
                                <?php if ($pageNum > 1): ?>
                                <a href="?<?php echo http_build_query($criteria + array('pageNum' => $pageNum - 1)) ?>">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    Previous
                                </a>
                                <?php endif; ?>

                                &nbsp;

                                <?php
                                echo "Showing "
                                        . PetListing::$objects->getFirstResultNum()
                                        . " - "
                                        . PetListing::$objects->getLastResultNum()
                                        . " of "
                                        . PetListing::$objects->getResultsCount()
                                        . " matching pets";
                                ?>

                                &nbsp;

                                <?php if ($pageNum < PetListing::$objects->getPageCount()): ?>
                                <a href="?<?php echo http_build_query($criteria + array('pageNum' => $pageNum + 1)) ?>">
                                    Next
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <?php endif; ?>

                            </p>
                        </div>
                    </div> <!-- /.row (paging) -->

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
