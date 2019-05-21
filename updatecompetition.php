<?php

//Starting/Resuming Session
session_start();

// Include database connection file
include_once('inc/connection.inc.php');

$id = $_GET['id'];
$competitionTitle = $_POST['competitionTitle'];
$competitionDate = $_POST['competitionDate'];
$competitionLocation = $_POST['competitionLocation'];
$competitionImg = $_POST['competitionImg'];
$competitionContent = nl2br(htmlentities($_POST['competitionContent'], ENT_QUOTES, 'UTF-8'));

//  SQL Statement to update record
$query = "UPDATE `tblCompetitions` SET competitionTitle='$competitionTitle', competitionDate='$competitionDate', competitionLocation='$competitionLocation', competitionImg='$competitionImg', competitionContent='$competitionContent' WHERE competitionID='$id'";

//Perform SQL Statement in Database
$result = $db->query($query);
    if ($result)
      header( "refresh:5;url=entrycompetitionchoice.php" );
      echo $competitionTitle . " - record updated successfully. You will be re-directed after 5 seconds. If you have not been redirected, <a href='entrycompetitionchoice.php'>Click Here</a>";
  $db->close();

?>