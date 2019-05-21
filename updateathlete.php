<?php

//Starting/Resuming Session
session_start();

// Include database connection file
include_once('inc/connection.inc.php');

$id = $_GET['id'];
$athleteFirstName = $_POST['athleteFirstName'];
$athleteSurname = $_POST['athleteSurname'];
$athleteDOB = $_POST['athleteDOB'];
$athleteHome = $_POST['athleteHome'];
$athleteImg = $_POST['athleteImg'];
$athleteContent = nl2br(htmlentities($_POST['athleteContent'], ENT_QUOTES, 'UTF-8'));

//  SQL Statement to update record
$query = "UPDATE `tblAthletes` SET athleteFirstName='$athleteFirstName', athleteSurname='$athleteSurname', athleteDOB='$athleteDOB', athleteHome='$athleteHome', athleteImg='$athleteImg', athleteContent='$athleteContent' WHERE athleteID='$id'";

//Perform SQL Statement in Database
$result = $db->query($query);
    if ($result)
      header( "refresh:5;url=entryathletechoice.php" );
      echo $athleteFirstName . ' ' . $athleteSurname . " - record updated successfully. You will be re-directed after 5 seconds. If you have not been redirected, <a href='entryathletechoice.php'>Click Here</a>";
  $db->close();

?>