<?php

//Include database connection file
include_once('inc/connection.inc.php');

$id = $_GET['id'];
$query2 = "select * from tblDiscipline WHERE disciplineID = $id";
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
    <title>ESP | <?php echo $row['disciplineName'];?></title>
    <!-- Favourites icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Local Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Hosted Stylesheets -->
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Facebook OG Meta tags -->
    <meta property="og:url"                content="<?php echo 'http://hecomplin.ncl-coll.ac.uk/~mskee/esp/discipline.php?' . $id;?>" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Elite Strongman Promotions" />
    <meta property="og:description"        content="<?php echo $row['disciplineName'];?>" />
    <meta property="og:image"              content="<?php echo $row['disciplineImg'];?>" />
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
                        <a href='become.php'>Become</i></a>
                    </li>
                    <li>
                        <a href='allarticles.php'>Posts</a>
                    </li>
                    <li>
                        <a href='upcoming.php'>Competitions</a>
                    </li>
                    <li>
                        <a href='disciplinechoice.php' class="active">Disciplines</a>
                    </li>
                    <li>
                        <a href='athletechoice.php'>Athletes</a>
                    </li>
                </ul>
                <a href='#' id='openup'>ESP</a>
            </nav>
        </header>
    <!-- Overview -->
    <section id="main" class="section bg-light">
        <div class="container">
            <div class="grid-display">
                <div class="main-right">
                    <h2><?php echo $row["disciplineName"];?></h2>
                </div>
                <div class="main-description">
                <br>
<!-- if rep discipline type -->
<?php if ($row['disciplineType'] === "reps")
{ ?>
                    <img src="<?php echo $row["disciplineImg"] ;?>" alt="<?php echo $row["disciplineName"] ;?>">
                    <br>
                    <p><?php echo $row["disciplineShortDesc"] ;?></p>
                    <p><?php echo $row["disciplineDescription"] ;?></p>
                </div>
                <!-- <div class="main-right">
                    <h2>Event Statistics</h2>
                    <p><strong>Most Reps: </strong>[]</p>
                    <p><strong>Lifted By: </strong>[]</p> -->
<?php }
// <!-- if repweight discipline type -->
elseif ($row['disciplineType'] === "repweight")
{?>
                    <img src="<?php echo $row["disciplineImg"] ;?>" alt="<?php echo $row["disciplineName"] ;?>">
                    <br>
                    <p><?php echo $row["disciplineShortDesc"] ;?></p>
                    <p><?php echo $row["disciplineDescription"] ;?></p>
                </div>
                <!-- <div class="main-right">
                    <h2>Event Statistics</h2>
                    <p><strong>Most Reps: </strong>[]</p>
                    <p><strong>Lifted By: </strong>[]</p>
                    <br>
                    <p><strong>Heaviest Weight: </strong>[]</p>
                    <p><strong>Lifted By: </strong>[]]</p> -->
<?php }
// <!-- if disttime discipline type -->
elseif ($row['disciplineType'] === "disttime")
{?>
                    <img src="<?php echo $row["disciplineImg"] ;?>" alt="<?php echo $row["disciplineName"] ;?>">
                    <br>
                    <p><?php echo $row["disciplineShortDesc"] ;?></p>
                    <p><?php echo $row["disciplineDescription"] ;?></p>
                </div>
                <!-- <div class="main-right">
                    <h2>Event Statistics</h2>
                    <p><strong>Furthest Distance: </strong>[]</p>
                    <p><strong>Performed By: </strong>[]]</p>
                    <br>
                    <p><strong>Quickest Over 20m: </strong>[]</p>
                    <p><strong>Performed By: </strong>[]</p> -->
<?php }
// <!-- if time discipline type -->
elseif ($row['disciplineType'] === "time")
{?>
                    <img src="<?php echo $row["disciplineImg"] ;?>" alt="<?php echo $row["disciplineName"] ;?>">
                    <br>
                    <p><?php echo $row["disciplineShortDesc"] ;?></p>
                    <p><?php echo $row["disciplineDescription"] ;?></p>
                </div>
                <!-- <div class="main-right">
                    <h2>Event Statistics</h2>
                    <p><strong>Quickest Over 20m: </strong>[]</p>
                    <p><strong>Performed By: </strong>[]</p> -->
<?php }
// <!-- if distance discipline type -->
elseif ($row['disciplineType'] === "distance")
{?>
                    <img src="<?php echo $row["disciplineImg"] ;?>" alt="<?php echo $row["disciplineName"] ;?>">
                    <br>
                    <p><?php echo $row["disciplineShortDesc"] ;?></p>
                    <p><?php echo $row["disciplineDescription"] ;?></p>
                </div>
                <!-- <div class="main-right">
                    <h2>Event Statistics</h2>
                    <p><strong>Furthest Distance: </strong>[]</p>
                    <p><strong>Performed By: </strong>[]]</p> -->
<?php }
// <!-- if anything else discipline type -->
else
{?>
                    <img src="<?php echo $row["disciplineImg"] ;?>" alt="<?php echo $row["disciplineName"] ;?>">
                    <br>
                    <p><?php echo $row["disciplineShortDesc"] ;?></p>
                    <p><?php echo $row["disciplineDescription"] ;?></p>
                </div>
                <!-- <div class="main-right"> -->
<?php } ?>
                <!-- </div> -->
            </div>
        </div>
    </section>
    <section id="slideshow" class="section bg-light">
        <div class="container">
            
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