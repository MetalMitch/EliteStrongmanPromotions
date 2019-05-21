<?php

    //Starting/Resuming Session
    session_start();

    //Include database connection file
    include_once('inc/connection.inc.php');

    $query = "select*from tblAthletes order by athleteFirstName";
    $result =$db -> query ($query);

    $num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESP | Elite Athletes</title>
    <!-- Favourites icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Local Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/discflex.css">
    <!-- Hosted Stylesheets -->
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
                        <a href='upcoming.php'>Competitions</a>
                    </li>
                    <li>
                        <a href='disciplinechoice.php'>Disciplines</a>
                    </li>
                    <li>
                        <a href='athletechoice.php' class="active">Athletes</a>
                    </li>
                </ul>
                <a href='#' id='openup'>ESP</a>
            </nav>
        </header>
    <!-- Main -->
    <section id="main" class="section bg-light">
        <br>
        <div class="container">
            <div class="grid-choice">
                <?php
                        $num = mysqli_num_rows($result);
                        for ($i=0; $i < $num; $i++)
        
                        {
                            $row = $result->fetch_assoc();
                    ?>
        
                <?php
                            // single quotes used for html so double quotes can be identifiers, double quotes used for new lines
                        echo '<div class="polaroid">' . "\r\n";
                        echo '<a href="athlete.php?id=' . $row['athleteID'] . '"><img src="' . $row['athleteImg'] . '" alt="' . $row['athleteFirstName'] . " " . $row['athleteSurname'] . '"></a>' . "\r\n";
                        echo '<div class="polaroidtext">';
                        echo '<p>' . $row['athleteFirstName'] . ' ' . $row['athleteSurname'] . '</p>';
                        echo '</div>' . "\r\n" . '</div>';
                    ?>
                <?php
                        }
                    ?>
            </div>
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
                        <a href="https://www.facebook.com/elitestrongman"><i
                                class="fab fa-facebook-f socialbtm"></i></a>
                        <a href="https://m.me/elitestrongman"><i class="fab fa-facebook-messenger socialbtm"
                                target="_blank"></i></a>
                        <a href="https://instagram.com/bobelitestrongman"><i class="fab fa-instagram socialbtm"></i></a>
                        <a href="mailto:elitestrongman@gmail.com?subject=Contact%20Us"><i
                                class="far fa-envelope socialbtm"></i></a>

                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            Copyright &copy; <?php echo date("Y"); ?> Elite Strongman Promotions
        </div>
    </footer>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>