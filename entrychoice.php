<?php

//Starting/Resuming Session
session_start();

// If not logged in, re-direct
if (!isset ($_SESSION['logged'])){
    header('location:unauthorised.php');
}

// Include database connection file
include_once('inc/connection.inc.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESP | Admin</title>
    <!-- Favourites icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Local Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="#">ESP</a>
                </li>
                <li>
                    <a href='entryarticlechoice.php'>Articles</a>
                </li>
                <li>
                    <a href='entryathletechoice.php'>Athletes</a>
                </li>
                <li>
                    <a href='entrycompetitionchoice.php'>Competitions</i></a>
                </li>
                <li>
                    <a href='entrydisciplinechoice.php'>Disciplines</a>
                </li>
                <li style="float:right">
                    <a href='logout.php'>Logout</a>
                </li>
            </ul>
            <a href='#' id='openup'>ESP</a>
        </nav>
    </header>
    <section id="links" class="bg-light" style="padding-top:1rem">
        <div id="howto">
            <h1>How to Submit Information</h2>
            <h2>Add athletes first, then Disciplines, then Competitions</h2>
            <h3>Search for the existing athletes or disciplines on the main website first</h3>
        </div>
        <div class="container-flex">
            <div class="articles">
                <div class="polaroid">
                    <a href="entryarticlechoice.php"><img src="images/entry/event.jpg" alt="Articles"></a>
                    <div class="polaroidtext">
                        <p>Click to edit or add new</p>
                        <p>Article</p>
                    </div>
                </div>
            </div>
            <div class="athletes">
                <div class="polaroid">
                    <a href="entryathletechoice.php"><img src="images/entry/athlete.jpg" alt="Athletes"></a>
                    <div class="polaroidtext">
                        <p>Click to edit or add new</p>
                        <p>Athlete</p>
                    </div>
                </div>
            </div>
            <div class="competitions">
                <div class="polaroid">
                    <a href="entrycompetitionchoice.php"><img src="images/entry/event.jpg" alt="Competitions"></a>
                    <div class="polaroidtext">
                        <p>Click to edit or add new</p>
                        <p>Competition</p>
                    </div>
                </div>
            </div>
            <div class="disciplines">
                <div class="polaroid">
                    <a href="entrydisciplinechoice.php"><img src="images/entry/discipline.jpg" alt="Disciplines"></a>
                    <div class="polaroidtext">
                        <p>Click to edit or add new</p>
                        <p>Discipline</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>
    <section id="admin">
        <div class="container">
            <h1>Administrative Tools</h1>
            <a href="register.php" class=" btn btn-primary mb mt">Add New User</a>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-cols">
                <div class="footer-left">
                    <ul>
                        <li>Navigation - Main Site</li>
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
                <div class="footer-right-entry">
                    <ul>
                        <li>Navigation - Admin Site</li>
                        <li>
                            <a href="entryarticlechoice.php">Edit Articles</a>
                        </li>
                        <li>
                            <a href="entryathletechoice.php">Edit Athletes</a>
                        </li>
                        <li>
                            <a href="entrycompetitionchoice.php">Edit Competitions</a>
                        </li>
                        <li>
                            <a href="entrydisciplinechoice.php">Edit Disciplines</a>
                        </li>
                        <li>
                            <a href="register.php">Add New User</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            Copyright &copy; <?php echo date("Y"); ?> Elite Strongman Promotions
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>