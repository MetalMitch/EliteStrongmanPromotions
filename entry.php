<?php 

//Starting/Resuming Session
session_start();

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
        </nav>
    </header>
    <!-- Overview -->
    <section id="main" class="section bg-light">
        <div class="container">
            <form method="post" action="login.php">
            <h1><span class="log-in">Log in</span></h1>
            <p class="float">
                <label for="login">Username</label>
                <input type="text" name="userName" placeholder="Username or email">
            </p>
            <p class="float">
                <label for="password"></i>Password</label>
                <input type="password" name="password" placeholder="Password" class="showpassword" id="passwordfield">
            <input type="checkbox" onclick="passwordReveal()"><p>Show Password</p>
            </p>
            <p class="clearfix">
                <input type="submit" name="submit" value="Submit">
            </p>
            </form>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <div class="container">
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