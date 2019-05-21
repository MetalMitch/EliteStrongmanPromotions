<?php

// Starting/Resuming Session
session_start();

// If not logged in, re-direct
if (!isset ($_SESSION['logged'])){
    header('location:unauthorised.php');
}

// Including Database Connection File
include_once('inc/connection.inc.php');

//Check to see if the form has been submitted
if (isset($_POST['submit']))
{
	//Check to see all fields have been completed, fields using an escape string to prevent illegal characters
    $athleteFirstName = mysqli_real_escape_string($db,$_POST['athleteFirstName']);
	$athleteSurname = mysqli_real_escape_string($db,$_POST['athleteSurname']);
	$athleteDOB = mysqli_real_escape_string($db,$_POST['athleteDOB']);
    $athleteHome = mysqli_real_escape_string($db,$_POST['athleteHome']);
    $athleteImg = mysqli_real_escape_string($db,$_POST['athleteImg']);

    // Storing content with spacing
    $athleteContent = nl2br(htmlentities($_POST['athleteContent'], ENT_QUOTES, 'UTF-8'));

	//Create an SQL Query to add the user and submit using prepared statement
	$stmt = $db-> prepare("INSERT INTO tblAthletes (athleteFirstName, athleteSurname, athleteDOB, athleteHome, athleteImg, athleteContent) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param("ssssss", $athleteFirstName, $athleteSurname, $athleteDOB, $athleteHome, $athleteImg, $athleteContent);
	$stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESP | Admin | New Athlete</title>
    <!-- Favourites icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Local Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/entry.css">
    <!-- Hosted Stylesheets -->
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Datepicker Jquery -->
    <script type="text/javascript">
        var datefield=document.createElement("input")
        datefield.setAttribute("type", "date")
        if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
            document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
        }
    </script>
    <script>
        if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
            jQuery(function($){ //on document.ready
                $('#birthday').datepicker();
            })
        }
    </script>
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
                    <a href='entryathletechoice.php' class="active">Athletes</a>
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
    <section id="form" class="bg-light" style="padding-top:1rem">
        <form action="#" method="post" class="entryform">
            <ul>
            <li>
                <label for="athleteFirstName">Athlete First Name</label>
                <input type="text" name="athleteFirstName" maxlength="35">
                <span>Enter the first name of the athlete here</span>
            </li>
            <li>
                <label for="athleteSurname">Athlete Surname</label>
                <input type="text" name="athleteSurname" maxlength="35">
                <span>Enter the surname of the athlete here</span>
            </li>
            <li>
                <label for="athleteDOB">Athlete Date of Birth</label>
                <input type="date" name="athleteDOB">
                <span>Enter the DOB of the athlete here</span>
            </li>
            <li>
                <label for="athleteHome">Athlete Hometown</label>
                <input type="text" name="athleteHome" maxlength="35">
                <span>Enter the Hometown of the athlete here</span>
            </li>
            <li>
                <label for="athleteImg">Athlete Image</label>
                <input type="text" name="athleteImg">
                <span>Enter the path of the image</span>
            </li>
            <li>
                <label for="athleteContent">Content</label>
                <textarea name="athleteContent" style="height:8rem"></textarea>
                <span>Please enter your athlete content here</span>
            </li>
            <li>
                <input type="submit" name="submit" i value="Submit"> <input type="reset">
            </li>
            </ul>
        </form>
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