<?php

    //Starting/Resuming Session
    session_start();

    //Include database connection file
    include_once('inc/connection.inc.php');
    //Query ignores competitions that have passed
    $query = "SELECT * FROM tblCompetitions WHERE competitionDate >= CURDATE() order by competitionDate";
    $result =$db -> query ($query);

    $num = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elite Strongman Promotions</title>
    <!-- Favourites icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Local Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Hosted Stylesheets -->
    <!-- W3.CSS --> <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Font Awesome-->    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
 <!-- Showcase & Nav -->
    <div id="showcase">
        <header>
            <nav class='cf'>
                <ul class='cf'>
                    <li class="hide-on-small">
                        <a href="#showcase">ESP</a>
                    </li>
                    <li>
                        <a href='#overview'>Become</i></a>
                    </li>
                    <li>
                        <a href='#articles'>Posts</a>
                    </li>
                    <li>
                        <a href='#upcoming'>Competitions</a>
                    </li>
                    <li>
                        <a href='#disciplines'>Disciplines</a>
                    </li>
                    <li>
                        <a href='#athletes'>Athletes</a>
                    </li>
                </ul>
                <a href='#' id='openup'>ESP</a>
            </nav>
        </header>
        <div class="section-main container">
            <img src="images/logosmall.png">
            <h1>Elite Strongman Promotions</h1>
        </div>
    </div>
    <!-- Overview -->
    <section id="overview" class="section bg-light">
            <div class="container">
                <h2 class="section-head">
                    <strong>Elite Competitions</strong>  <i class="fab fa-creative-commons-nd"></i>  Elite Athletes
                </h2>
                <!-- Full-width images -->
                <p class="lead">Starting around 1993, organiser Robert Daglish began promoting Strongman Events, steadily adding more and more yearly
                    competitions to his repertoire.</p>
                <p class="lead">In 2000, he branded himself Elite Strongman Promotions.</p>
                <p class="lead">Nationwide, we have held a wealth of competitions, such as England’s and Britain’s Strongest
                    Man, with athletes of all calibres, from novice athletes, to some of Britain’s, and indeed the World’s most
                    recognisable competitors.</p>
                <br>
                <p class="lead">If you are interested in becoming a strongman or woman, we host classes regularly. Fill out our contact form to "Become an Elite Athlete" and we will make contact with you shortly.</p>
                <a href="become.php" class=" btn btn-primary mb mt">Become an Elite Athlete</a>
            </div>
    </section>
    <!-- Articles -->
    <section id="articles" class="section">
            <div class="container">
                <h2 class="section-head">
                    <strong>Elite Strongman Posts</strong>
                </h2>
                <p class="lead">Elite Strongman Promotions will from time to time post articles</p>
                <p class="lead">Announcements, Competition Results and more</p>
                <br>
                <a href="allarticles.php" class=" btn btn-primary mb mt">Click Here to see ESP posts</a>
            </div>
    </section>
    <!-- Upcoming Competitions -->
    <section id="upcoming" class="section bg-light">
        <br>
        <div class="container">
            <div class="grid-choice">
                <?php
                            $num = mysqli_num_rows($result);
                            for ($i=0; $i < 3; $i++)
            
                            {
                                $row = $result->fetch_assoc();
                        ?>

                    <?php
                                // single quotes used for html so double quotes can be identifiers, double quotes used for new lines
                            echo '<div class="polaroid">' . "\r\n";
                            echo '<a href="competition.php?id=' . $row['competitionID'] . '"><img src="' . $row['competitionImg'] . '" alt="' . $row['competitionTitle'] . '"></a>' . "\r\n";
                            echo '<div class="polaroidtext">';
                            echo '<p>' . $row['competitionTitle'] . '</p>';
                            echo '</div>' . "\r\n" . '</div>';
                        ?>
                    <?php
                            }
                        ?>
            </div>
            <a href="upcoming.php" class=" btn btn-primary mb mt">All Upcoming Competitions</a>
        </div>
    </section>
     <!-- Disciplines -->
    <section id="disciplines" class="section">
        <div class="container">
            <h2>Learn about our Elite Disciplines:</h2>
            <p class="lead">Elite Strongman Promoions has many disciplines in which to test our athletes</p>
            <p class="lead">Some test an athletes strength</p>
            <p class="lead">Some test their endurance</p>
            <h2>All of them test an athletes will to succeed</h2>
            <a href="disciplinechoice.php" class=" btn btn-primary mb mt">Elite Disciplines</a>
        </div>
    </section>
    <!-- Athletes -->
    <section id="athletes" class="section bg-light">
        <div class="container">
            <h2>Meet our Elite Athletes:</h2>
            <p class="lead">Bodybuilders, Powerlifters, ex-rugby players, even school teachers!</p>
            <p class="lead">Elite Strongman Promoions has many athletes of all calibres</p>
            <p class="lead">Some compete for fun, others compete for personal growth</p>
            <h2>Others even become england's or even world's strongest man</h2>

            <a href="athletechoice.php" class=" btn btn-primary mb mt">Elite Athletes</a>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-cols">
                <div class="footer-left">
                    <ul>
                        <li>Navigation</li>
                        <li>
                            <a href="become.php">Become an Elite Athlete</a>
                        </li>
                        <li>
                            <a href="allarticles.php">Elite Posts</a>
                        </li>
                        <li>
                            <a href="upcoming.php">Elite Competitions</a>
                        </li>
                        <li>
                            <a href="disciplinechoice.php">Elite Disciplines</a>
                        </li>
                        <li>
                            <a href="athletechoice.php">Elite Athletes</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-right">
                    <ul>
                        <li>Contact Us</li>
                            <a href="https://www.facebook.com/elitestrongman"><i class="fab fa-facebook-f socialbtm"></i></a>
                            <a href="https://m.me/elitestrongman"><i class="fab fa-facebook-messenger socialbtm" target="_blank"></i></a>
                            <a href="https://instagram.com/bobelitestrongman"><i class="fab fa-instagram socialbtm"></i></a>
                            <a href="mailto:elitestrongman@gmail.com?subject=Contact%20Us"><i class="far fa-envelope socialbtm"></i></a>

                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            Copyright &copy; <?php echo date("Y"); ?> Elite Strongman Promotions
        </div>
    </footer>
    <!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/indexslide.js"></script>
</body>
</html>