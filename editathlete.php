<?php

// Starting/Resuming Session
session_start();

// Including Database Connection File
include_once('inc/connection.inc.php');

$id = $_GET['id'];
$query2 = "select * from tblAthletes WHERE athleteID = $id";
$result =$db -> query ($query2);
$num = mysqli_num_rows($result);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESP | Admin | Edit <?php echo $row['athleteFirstName'] . ' ' . $row['athleteSurname'];?></title>
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
                    <a href='entryathletechoice.php' class="active">Athletes</a>
                </li>
                <li>
                    <a href='entrycompetitionchoice.php'>Competitions</i></a>
                </li>
                <li>
                    <a href='entrydisciplinechoice.php'>Disciplines</a>
                </li>
            </ul>
            <a href='#' id='openup'>ESP</a>
        </nav>
    </header>
    <section id="form" class="bg-light" style="padding-top:1rem">
        <form action="updateathlete.php?id=<?php echo $id?>" method="post" class="entryform">
            <ul>
            <li>
                <label for="athleteFirstName">Athlete First Name</label>
                <input type="text" name="athleteFirstName" maxlength="35" value="<?php echo $row['athleteFirstName']?>">
                <span>Enter the first name of the athlete here</span>
            </li>
            <li>
                <label for="athleteSurname">Athlete Surname</label>
                <input type="text" name="athleteSurname" maxlength="35" value="<?php echo $row['athleteSurname']?>">
                <span>Enter the surname of the athlete here</span>
            </li>
            <li>
                <label for="athleteDOB">Athlete Date of Birth</label>
                <input type="date" name="athleteDOB" value="<?php echo $row['athleteDOB']?>">
                <span>Enter the DOB of the athlete here</span>
            </li>
            <li>
                <label for="athleteHome">Athlete Hometown</label>
                <input type="text" name="athleteHome" maxlength="35" value="<?php echo $row['athleteHome']?>">
                <span>Enter the Hometown of the athlete here</span>
            </li>
            <li>
                <label for="athleteImg">Athlete Image</label>
                <input type="text" name="athleteImg" value="<?php echo $row['athleteImg']?>">
                <span>Enter the path of the image</span>
            </li>
            <li>
                <label for="athleteContent">Content</label>
                <textarea name="athleteContent" style="height:8rem"><?php echo strip_tags($row['athleteContent']);?></textarea>
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