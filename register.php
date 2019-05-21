<?php 

//Starting/Resuming Session
session_start();

// If not logged in, re-direct
if (!isset ($_SESSION['logged'])){
    header('location:unauthorised.php');
}

//Include database connection file
include_once('inc/connection.inc.php');

//Check to see if the form has been submitted
if (isset($_POST['submit']))
{
	//Check to see all fields have been completed, fields using an escape string to prevent illegal characters
	$userName = mysqli_real_escape_string($db,$_POST['userName']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $firstName = mysqli_real_escape_string($db,$_POST['firstName']);
    $surname = mysqli_real_escape_string($db,$_POST['surname']);

    //Create an SQL Query to add the user and submit using prepared statement
	$stmt = $db-> prepare("INSERT INTO tblLogin (userName, password, firstName, surname) VALUES (?,?,?,?)");
	$stmt->bind_param("ssss", $userName, $password, $firstName, $surname);
	$stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESP | Admin | New User</title>
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
    <!-- Overview -->
    <section id="main" class="section bg-light">
            <form name="register" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="entryform">
            <ul>
            <li>
                <label for="userName">Username</label>
                <input type="text" name="userName" maxlength="35">
                <span>Enter the username to log in with</span>
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" class="showpassword" id="passwordfield">
                <span>Enter the password to log in with.</span>
                <span><input type="checkbox" onclick="passwordReveal()">Tick this box to reveal the Password</span>
            </li>
            <li>
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" maxlength="35">
                <span>Enter the user's first name</span>
            </li>
            <li>
                <label for="surname">Surname</label>
                <input type="text" name="surname" maxlength="35">
                <span>Enter the user's surname</span>
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
                <div class="footer-right">
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
    <script src="js/reveal.js"></script>
</body>
</html>