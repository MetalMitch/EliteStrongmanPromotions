<?php
    // Message Vars
    $msg = '';
    $msgClass = '';
    //check for submit
    if (filter_has_var(INPUT_POST, 'submit')){
        //Get Form Data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $number = htmlspecialchars($_POST['number']);
        $message = htmlspecialchars($_POST['message']);

        // Check Required Fields
        if(!empty($name) && !empty($email) && !empty($number) && !empty($message)){
            //Passed
                //Check Email
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    //Failed
                    $msg = 'Please use a Valid email';
                    $msgClass - 'alert-danger';
                } else {
                    //Passed
                    //Receipent email
                    $toEmail = 'dev.elitestrongman@gmail.com';
                    $subject = 'Contact Request From ' . $name;
                    $body = '<h2>Contact Request</h2>
                             <h4>Name</h4><p>' . $name . '</p>
                             <h4>Email</h4><p>' . $email . '</p>
                             <h4>Number</h4><p>' . $number . '</p>
                             <h4>Message</h4><p>' . $message . '</p>
                    ';

                    //Email Headers
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .="Content-Type:text/html;charset=UTF-8" . "
                        \r\n";
                    
                    // Additional Headers
                    $headers .= "From " . $name . "<" . $email . ">" . "\r\n";

                    if(mail($toEmail, $subject, $body, $headers)){
                        // Email Sent
                        $msg = 'Your Request has been submitted';
                        $msgClass - 'alert-success';
                    } else {
                        // Failed
                        $msg = 'Your Email was not sent';
                        $msgClass - 'alert-danger';
                    }
                }
        } else {
            //Failed
            $msg = 'Please fill in all fields';
            $msgClass - 'alert-danger';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESP | Become an Elite Athlete</title>
    <!-- Favourites icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Local Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Hosted Stylesheets -->
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Facebook OG Meta tags -->
    <meta property="og:url"                content="http://hecomplin.ncl-coll.ac.uk/~mskee/esp/become.php" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Elite Strongman Promotions" />
    <meta property="og:description"        content="Become an Elite Athlete" />
    <meta property="og:image"              content="http://hecomplin.ncl-coll.ac.uk/~mskee/esp/images/logosmall.png" />
    <meta property="fb:app_id"             content="292683564744029" />
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
                        <a href='become.php' class="active">Become</i></a>
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
                        <a href='athletechoice.php'>Athletes</a>
                    </li>
                </ul>
                <a href='#' id='openup'>ESP</a>
            </nav>
        </header>
    <!-- Overview -->
    <section id="slideshow">
        
    </section>
    <section id="main" class="section bg-light">
        <div class="container">
            <br>
            <h1>Become an Elite Athlete</h1>
            <h2>Elite Strongman Promotions train many athletes, from novice competitors, to Britain's elite</h2>
            <h3>ESP Promoter Bob Daglish hosts regular training sessions with our equipment and has done for many years. These sessions are open to anyone who is interested.</h3>
            <p class="lead">If you think you have what it takes to become an elite athlete, no matter your skill level, fill in our simple form below to contact us, and we'll get back to you</p>
            <br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contactform" class="entryform">
            <!-- PHP Validation error message -->
            <?php if($msg != ''): ?>
                <div class="alert <?php echo $msgClass; ?>" style="color: #721c24;"><?php echo $msg; ?></div>
            <?php endif; ?>
                <ul>
                    <li>
                        <label for="name">Name</label>
                        <input type="text" name="name" maxlength="35" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                        <span>Enter your full name here</span>
                    </li>
                    <li>
                        <label for="email">Email</label>
                        <input type="email" name="email" maxlength="100" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                        <span>Enter a valid email address</span>
                    </li>
                    <li>
                        <label for="number">Number</label>
                        <input type="tel" name="number" maxlength="11" value="<?php echo isset($_POST['number']) ? $number : ''; ?>">
                        <span>Enter your phone number here</span>
                    </li>
                    <li>
                        <label for="message">About You</label>
                        <textarea name="message" onkeyup="adjust_textarea(this)"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                        <span>Enter your message</span>
                    </li>
                    <button type="submit" name="submit" class="btn btn-secondary mb mt">Submit</button>
                    <button type="reset" class="btn btn-primary mb mt">Restart</button>
            </form>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>