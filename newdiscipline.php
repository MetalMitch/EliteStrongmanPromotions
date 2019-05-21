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
    // Grab select element which is an array and store its value
    foreach ($_POST['disciplineType'] as $disciplineType)

	//Check to see all fields have been completed, fields using an escape string to prevent illegal characters
    $disciplineName = mysqli_real_escape_string($db,$_POST['disciplineName']);
    $disciplineImg = mysqli_real_escape_string($db,$_POST['disciplineImg']);

    // Storing content with spacing
    $disciplineShortDesc = nl2br(htmlentities($_POST['disciplineShortDesc'], ENT_QUOTES, 'UTF-8'));
    $disciplineDescription = nl2br(htmlentities($_POST['disciplineDescription'], ENT_QUOTES, 'UTF-8'));

	//Create an SQL Query to add the user and submit using prepared statement
	$stmt = $db-> prepare("INSERT INTO tblDiscipline (disciplineName, disciplineType, disciplineShortDesc, disciplineDescription, disciplineImg) VALUES (?,?,?,?,?)");
	$stmt->bind_param("sssss", $disciplineName, $disciplineType, $disciplineShortDesc, $disciplineDescription, $disciplineImg);
	$stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESP | Admin | New Discipline</title>
    <!-- Favourites icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Local Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/entry.css">
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
                    <a href='entrydisciplinechoice.php' class="active">Disciplines</a>
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
                <label for="disciplineName">Discipline Name</label>
                <input type="text" name="disciplineName" maxlength="35">
                <span>Enter the name of the discipline here</span>
            </li>
            <li>
                <Label for="disciplineType[]">Discipline Type</label>
                <select name="disciplineType[]">
                    <option value="reps">Reps</option>
                    <option value="repweight">Reps/Weight</option>
                    <option value="disttime">Distance/Time</option>
                    <option value="distance">Distance</option>
                    <option value="time">Time</option>
                    <option value="none" selected>None</option>
                </select>
                <span>Choose how this discipline will ultimately be decided</span>
            </li>
            <li>
                <label for="disciplineShortDesc">Short Description</label>
                <textarea name="disciplineShortDesc" style="height:5rem"></textarea>
                <span>Enter a short description to preview the discipline</span>
            </li>
            <li>
                <label for="disciplineDescription">Description</label>
                <textarea name="disciplineDescription" style="height:8rem"></textarea>
                <span>Finish the description (its page will show the Short description, then this)</span>
            </li>
            <li>
                <label for="disciplineImg">Discipline Image</label>
                <input type="text" name="disciplineImg">
                <span>Enter the path of the image</span>
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