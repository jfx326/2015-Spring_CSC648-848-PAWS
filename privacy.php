<!DOCTYPE html>
<?php
session_name("PAWS_SESSION_ID");
session_start();
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Privacy-PAWS</title>

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
                <div class="col-lg-12 clearfix">
                    <h1 class="intro-text">Privacy Policy</h1>
                    <p>PAWS is strongly committed to protecting the privacy of all of its users and the confidentiality of all of its users' personal information in the usage of all of PAWS's services. Please read to understand what personal information PAWS collects when accessing its services, and how and why PAWS uses and collects such information.</p>
                    <h1 class="intro-text">What does PAWS collect?</h1>
                    <p>When accessing PAWS and its services, PAWS collects...</p>
                    <ul>
                        <li>Information you give to PAWS.
                            <ul>
                                <li>When you log in to PAWS, PAWS will ask you for personal information such as name, e-mail address, home address, and ZIP code.</li>
                                <li>Additionally, for specific services, PAWS will ask you for photos.</li>
                            </ul>
                        </li>
                        <li>Device-related information, such as browser and operating system.</li>
                        <li>Location information, particularly IP addresses.</li>
                        <li>Web history information.</li>
                        <li>Log information, such as...
                            <ul>
                                <li>Duration of the visit.</li>
                                <li>Search queries.</li>
                                <li>Device event information, such as crashes.</li>
                                <li>Other already existing cookies that identified your browser.</li>
                            </ul>
                        </li>
                    </ul>
                    <h1 class="intro-text">How and why does PAWS use this information?</h1>
                    <p>PAWS uses this information to provide services specific to each of its users, to improve user experience, and to improve its services. PAWS will never share this information with third-party entities.</p>
                    <h1 class="intro-text">Can I access and control the information that I share with PAWS?</h1>
                    <p>Yes. Again, PAWS strongly honors the confidentiality of all of its users' personal information and is strongly committed to protect that confidentiality. Users may access, correct, omit, and update any personal information that you shared with PAWS at any time.</p>
                    <h1 class="intro-text">Will there be any changes to PAWS's Privacy Policy?</h1>
                    <p>PAWS's Privacy Policy may change from time to time. PAWS will prominently and conspicuously inform you and all of its users for any incoming changes to its Privacy Policy. Furthermore, PAWS will not limit nor reduce any of your rights under this Privacy Policy without your consent.</p>
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

</body>

</html>
