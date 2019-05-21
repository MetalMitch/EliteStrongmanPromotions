<?php

    //Starting/Resuming Session
    session_start();

    //Include database connection file
    include_once('inc/connection.inc.php');

    $query = "select*from tblCompetitions order by CompetitionDate";
    $result =$db -> query ($query);

    $num = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESP | Elite Competitions</title>
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
       <header>
            <nav class='cf'>
                <ul class='cf'>
                    <li class="hide-on-small">
                        <a href="index.php">ESP</a>
                    </li>
                    <li>
                        <a href='become.php'>Become</i></a>
                    </li>
                    <li>
                        <a href='allarticles.php'>Posts</a>
                    </li>
                    <li>
                        <a href='upcoming.php' class="active">Competitions</a>
                    </li>
                    <li>
                        <a href='disciplinechoice.php'>Disciplines</a>
                    </li>
                    <li>
                        <a href='athletechoice.php'>Athletes</a>
                    </li>
                </ul>
                <a href='#' id='openup'>ESP</a>
            </nav>
        </header>
        <br>
        <?php
                $num = mysqli_num_rows($result);
                for ($i=0; $i < $num; $i++)
                {
                    $row = $result->fetch_assoc();
            ?>

        <?php
                // every other section switches between light and dark class
            if ($i % 2 == 0) {
                    echo '<section id="article' . $row['articleID'] . '" class="section bg-light">';
            }
            else {
                    echo '<section id="article' . $row['articleID'] . '" class="section">';
            }
            // single quotes used for html so double quotes can be identifiers, double quotes used for new lines
            echo '<div class="container">';
            echo '<h2 class="section-head">';
            echo '<a href="competition.php?id=' . $row['competitionID'] . '"><img src="' . $row['competitionImg'] . '" alt="' . $row['competitionTitle'] . '" style="height:250px; width:auto;"></a>' . "\r\n";
            echo '</h2>';
            echo '<a href="competition.php?id=' . $row['competitionID'] . '">' . $row['competitionTitle'] . '</a>' . "\r\n";
            echo '</div>';
            echo '</section>';
        ?>
    <?php
            }
        ?>
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