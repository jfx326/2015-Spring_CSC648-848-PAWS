<!DOCTYPE html>
<?php
session_name("PAWS_SESSION_ID");
session_start();


if (!isset($_SESSION['userId'])) {
    $_SESSION['errormsg'] = "You must be logged in to view that page.";
    header('Location: user-registration.php');
}

require_once 'models/PetListing.php';
require_once 'exceptions/DoesNotExist.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    try {
        $listing = PetListing::$objects->get($id);
    } catch (DoesNotExist $e) {
        // display an error message
        $id = 0;
    }
} else {
    $id = 0;
}

if ($id == 0) {
    $listing = new PetListing();
}

$title = ($id == 0 ? "Add" : "Edit") . " Pet Listing";

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
    <?php include './include/header.php'; ?>
    <?php include './include/navigation-bar.php'; ?>

    <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <h2 class="intro-text"><b>Pet Registration</b>
                        </h2>
                        <p><i>An asterisk(*) indicates a required field.</i></p>
                    </div>
                    <div class="panel-body">
                        <form action="form-handlers/pet-listing-submit.php" role="form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <!-- name, sex -->
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <p class="col-sm-4 control-label"><b>Pet Name<sup>*</sup>:</b></p>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="<?php echo $listing->name; ?>" id="nameField" >
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <p class="col-sm-4 control-label"><b>Sex<sup>*</sup>:</b></p>
                                    <div class="col-sm-8">
                                        <select name="sex" class="form-control" id="sexField">
                                            <option value="">Select one</option>
                                            <option <?php if ($listing->sex == 'M') echo 'selected'; ?> 
                                            value="M">Male</option>
                                            <option <?php if ($listing->sex == 'F') echo 'selected'; ?>
                                            value="F">Female</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- species, breed-->
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <p class="col-sm-4 control-label"><b>Species<sup>*</sup>:</b></p>
                                    <div class="col-sm-8">
                                        <select name="species" class="form-control" id="speciesField">
                                            <option value="">Select one</option>
                                            <option <?php if ($listing->species == 'cat') echo 'selected'; ?> value="cat">Cat</option>
                                            <option <?php if ($listing->species == 'dog') echo 'selected'; ?>value="dog">Dog</option>
                                            <option <?php if ($listing->species == 'other') echo 'selected'; ?>value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <p class="col-sm-4 control-label"><b>Breed<sup>*</sup>:</b></p>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="breed" value="<?php echo $listing->breed; ?>" id="breedField">
                                    </div>
                                </div>
                            </div>
                            <!-- age, zip code-->
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <p class="col-sm-4 control-label"><b>Age<sup>*</sup>:</b></p>
                                    <div class="col-sm-8">
                                        <select name="age" class="form-control" id="ageField">
                                            <option value="">Select one</option>
                                            <option <?php if ($listing->age == '0') echo 'selected'; ?> value="0">Young</option>
                                            <option <?php if ($listing->age == '1') echo 'selected'; ?> value="1">Adult</option>
                                            <option <?php if ($listing->age == '2') echo 'selected'; ?> value="2">Senior</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <p class="col-sm-4 control-label"><b>Zip Code<sup>*</sup>:</b></p>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="zip" value="<?php echo $listing->zip; ?>" id="zipField" min="90001" max="96162">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- spayed, microchipped -->
                            <div class="row">
                                <div class="col-sm-12"><p>Optional</p></div><br>
                                <div class="col-sm-6 radio-inline">
                                    <p class="col-sm-6 control-label"><b>Spayed/Neutered?</b></p>
                                    <div class="form-group col-sm-6">
                                        <label class="radio-inline">
                                            <input class type="radio" name="deSexed" value="0">No</label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="deSexed" value="1">Yes</label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="deSexed" value="" checked>Unknown</label>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-6 radio-inline">
                                    <p class="col-sm-6 control-label"><b>Microchipped?</b></p>
                                    <div class="form-group col-sm-6">
                                        <label class="radio-inline">
                                            <input class type="radio" name="microchipped" value="0">No
                                        </label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="microchipped" value="1">Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="microchipped" value="" checked>Unknown
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- hypoallergenic -->
                            <div class="row">
                                <div class="col-sm-6 radio-inline">
                                    <p class="col-sm-6 control-label"><b>Hypoallergenic?</b></p>
                                    <div class="form-group col-sm-6">
                                        <label class="radio-inline">
                                            <input class type="radio" name="hypoallergenic" value="0">No
                                        </label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="hypoallergenic" value="1">Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="hypoallergenic" value="" checked>Unknown
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>

                            <hr>

                            <!-- declawed, outdoors -->
                            <div class="row">
                                <div class="col-sm-12"><p>For Cats Only</p></div><br>
                                <div class="col-sm-6 radio-inline">
                                    <p class="col-sm-6 control-label"><b>Declawed?</b></p>
                                    <div class="col-sm-6">
                                        <label class="radio-inline">
                                            <input class type="radio" name="declawed" value="0">No
                                        </label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="declawed" value="1">Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="declawed" value="" checked>Unknown
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-6 radio-inline">
                                    <p class="col-sm-6 control-label"><b>Outdoors?</b></p>
                                    <div class="col-sm-6">
                                        <label class="radio-inline">
                                            <input class type="radio" name="outdoor" value="0">No
                                        </label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="outdoor" value="1">Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input class type="radio" name="outdoor" value="" checked>Unknown
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <!-- description -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <p class="col-sm-4 control-label"><b>Description:</b></p>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="description" value="<?php echo $listing->description; ?>" id="description" rows="12"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <!-- photos -->
                            <div class="row col-sm-12 form-group">                                    
                                <p class="col-sm-4 control-label"><b>Photos:</b></p><br><br>
                                <div class="col-sm-12 row">
                                    <div class="col-sm-3 box">
                                        <p>Upload a photo</p>
                                        <input type="file" name="photo[0]">
                                        <p>Add a caption:</p>
                                        <textarea class="form-control" name="caption[0]" id="caption0" rows="4"></textarea>
                                    </div>
                                    <div class="col-sm-3 box">
                                        <p>Upload a photo</p>
                                        <input type="file" name="photo[1]">
                                        <p>Add a caption:</p>
                                        <textarea class="form-control" name="caption[1]" id="caption1" rows="4"></textarea>
                                    </div>
                                    <div class="col-sm-3 box">
                                        <p>Upload a photo</p>
                                        <input type="file" name="photo[2]">
                                        <p>Add a caption:</p>
                                        <textarea class="form-control" name="caption[2]" id="caption2" rows="4"></textarea>
                                    </div>
                                    <div class="col-sm-3 box">
                                        <p>Upload a photo</p>
                                        <input type="file" name="photo[3]">
                                        <p>Add a caption:</p>
                                        <textarea class="form-control" name="caption[3]" id="caption3" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success btn-lg pull-right">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    <?php include './include/footer.php'; ?>

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

