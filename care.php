<!DOCTYPE html>
<?php
session_name("PAWS_SESSION_ID");
session_start();
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
        <style>
            .panel-title {
                font-size: 20px;
                background-color: #eee;   
            }
        </style>
    </head>
    <body>
        <!--header and navigation bar-->
        <?php include './include/header.php';?>
        <?php include './include/navigation-bar.php';?>
	
	<div class="container">
            <div class="row">
		<!-- 10 tips from WebMD -->
                <div class="col-sm-9">
                    <div class="box">
                        <h2 class="intro-text"><b>Pet Care</b></h2>
			<hr>
			<p><b>10 Things Veterinary Professionals Want You to Know About Pet Care</b><p>
                        <p><i>From <a href="http://pets.webmd.com/ask-pet-health-11/vets-pet-care?page=1">WebMD</a>:</i></p><br>
                        <!-- accordion -->
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            1. Regular Exams are Vital</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body"><p>Just like you, your pet can get heart problems, develop arthritis, or have a toothache. The best way to prevent such problems or catch them early is to see your veterinarian every year.<br><br>

                                            Regular exams are "the single most important way to keep pets healthy," says Kara M. Burns, MS, Med, LVT, president of the Academy of Veterinary Nutrition Technicians.<br><br>

                                        Annual vet visits should touch on nutrition and weight control, says Oregon veterinarian Marla J. McGeorge, DVM, as well as cover recommended vaccinations, parasite control, dental exam, and health screenings.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            2. Spay and Neuter Your Pets</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body"><p>Eight million to 10 million pets end up in U.S. shelters every year. Some are lost, some have been abandoned, and some are homeless.<br><br>

                                            Here's an easy way to avoid adding to that number -- spay and neuter your cats and dogs. It's a procedure that can be performed as early as six to eight weeks of age.<br><br>

                                        Spaying and neutering doesn't just cut down on the number of unwanted pets; it has other substantial benefits for your pet. Studies show it also lowers the risk of certain cancers, Burns tells WebMD, and reduces a pet's risk of getting lost by decreasing the tendency to roam.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                            3. Prevent Parasites</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body"><p>Fleas are the most common external parasite that can plague pets, and they can lead to irritated skin, hair loss, hot spots, and infection. Fleas can also introduce other parasites into your cat or dog. All it takes is for your pet to swallow one flea, and it can to end up with tapeworms, the most common internal parasite affecting dogs and cats.<br><br>

                                            Year-round prevention is key, says McGeorge, who suggests regular flea and intestinal parasite control, as well as heartworm prevention in endemic areas.<br><br> 
                                            
                                            Because some parasite medications made for dogs can be fatal to cats, talk to your vet about keeping your precious pets worm-free, flea-free -- and safe.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                            4. Maintain a Healthy Weight</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body"><p>Many dogs and cats in the U.S. are overweight or obese. And just like people, obesity in pets comes with health risks that include diabetes, arthritis, and cancer.<br><br>

                                            Overfeeding is the leading cause of obesity, says Douglas, who adds that keeping our pets trim can add years to their lives.<br><br>

                            Because pets need far fewer calories than most of us think -- as little as 185-370 a day for a small, inactive dog; just 240-350 calories daily for a 10-pound cat -- talk to your vet, who can make feeding suggestions based on your pet's age, weight, and lifestyle.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                            5. Get Regular Vaccinations</a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                    <div class="panel-body"><p>For optimal health, pets need regular vaccinations against common ills, such as rabies, distemper, feline leukemia, and canine hepatitis.<br><br>

                                            How often your dog or cat needs to be immunized depends on their age, lifestyle, health, and risks, says McGeorge, so talk to your vet about the vaccinations that make sense for your pet.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                            6. Provide an Enriched Environment</a>
                                    </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse">
                                    <div class="panel-body"><p>An enriched environment is another key to the long-term health and welfare of your canine and feline friends, says C.A. Tony Buffington, DVM, PhD, a veterinary nutritionist and professor at Ohio State University Veterinary Medical Center in Columbus.<br><br>

                                            Pets need mental stimulation, say the pros, which may mean daily walks for your pooch, and scratching posts, window perches, and toys for your cat. It means play time with you, which not only keeps your pet's muscles toned and boredom at bay, it also strengthens your bond with your four-footed companions.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                            7. ID Microchip Your Pet</a>
                                    </h4>
                                </div>
                                <div id="collapse7" class="panel-collapse collapse">
                                    <div class="panel-body"><p>Lack of identification means as few as 14% of pets ever find their way home after getting lost. Fortunately, "microchipping allows for the pet to be reunited with its family," no matter how far away it is when found, Burns says.<br><br>

                                            About the size of a rice grain, a microchip is inserted under the skin in less than a second. It needs no battery and can be scanned by a vet or an animal control officer in seconds. Be sure to register the chip ID with the chip's maker. A current registration is the vital last step in making certain your pet can always find his way home.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                                            8. Pets Need Dental Care, Too</a>
                                    </h4>
                                </div>
                                <div id="collapse8" class="panel-collapse collapse">
                                    <div class="panel-body"><p>Just like you, your pet can suffer from gum disease, tooth loss, and tooth pain. And just like you, regular brushing and oral cleanings help keep your pet's teeth strong and healthy.<br><br>

                                            "Dental disease is one of the most common preventable illnesses in pets," Ohio veterinarian Vanessa Douglas tells WebMD, "yet many people never even look in their pet's mouths."<br><br>

                            It's estimated 80% of dogs and 70% cats show signs of dental disease by age three, leading to abscesses, loose teeth, and chronic pain. In addition to regular dental cleanings by your vet, "periodontal disease can be avoided by proper dental care by owners," Douglas says. Owner care includes brushing, oral rinses, and dental treats. Your vet is a good source of information about brushing techniques, oral rinses, and dental treats.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                                            9. Never Give Pets People Medication</a>
                                    </h4>
                                </div>
                                <div id="collapse9" class="panel-collapse collapse">
                                    <div class="panel-body"><p>Medicines made for humans can kill your pet, says Georgia veterinarian Jean Sonnenfield, DVM. As a matter of fact, in 2010 the ASPCA listed human drugs in the top 10 pet toxins.<br><br>

                                            NSAIDs like ibuprofen and naproxen are the most common pet poisoning culprits, but antidepressants, decongestants, muscle relaxants, and acetaminophen are just a few of the human drugs that pose health risks to pets. Human drugs can cause kidney damage, seizures, and cardiac arrest in a dog or cat.<br><br>

                            If you suspect your pet has consumed your medication -- or anything toxic -- call the 24-hour ASPCA Animal Poison Control Center. Also be sure to immediately check with your vet, and if it is during evening or weekend hours when your regular veterinary clinic may be closed, check for a local 24-hour emergency veterinary clinic and take your pet there for an examination. Many metropolitan areas have these clinics.</p></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                                            10. Proper Restraint in a Vehicle</a>
                                    </h4>
                                </div>
                                <div id="collapse10" class="panel-collapse collapse">
                                    <div class="panel-body"><p>You buckle up for safety when you're in the car, shouldn't your pet? Unrestrained pets in a car are a distraction to the driver, and can put driver and pet at risk for serious injury, "or worse," says veterinarian Douglas. To keep pets safe in transit:<br><br>

                                        <ul>
                                            <li><p>Never allow pets to travel in the front seat, where they're at risk of severe injury or death if the airbag deploys.</p></li>
                                            <li><p>Don't let dogs ride with their head out the window or untethered in the back of a truck bed. Both practices put them at risk of being thrown from the vehicle in the event of an accident.</p></li>
                                            <li><p>To keep pets safe, confine cats to carriers, suggests Douglas, then secure the carrier with a seatbelt. For dogs, there's the option of a special harness attached to a seat belt, or a well-secured kennel.</p></li></ul></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
		
		<!-- external links -->
                <div class="col-sm-3">
                    <div class="box">
                        <h4>Additional Pet Care Resources</h4><hr>
                        <a href="https://www.avma.org/public/petcare/pages/default.aspx">
                            American Vetenary Medical Association
                        </a><br><br>
                        <a href="https://www.aspca.org/pet-care">
                            American Society for the Prevention of Cruelty to Animals
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php include './include/footer.php';?>
	
	<!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
