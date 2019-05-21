<?php

//Starting/Resuming Session
session_start();

// Include database connection file
include_once('inc/connection.inc.php');

$id = $_GET['id'];
$disciplineName = $_POST['disciplineName'];
$disciplineType = $_POST['disciplineType'];
$disciplineShortDesc = nl2br(htmlentities($_POST['disciplineShortDesc'], ENT_QUOTES, 'UTF-8'));
$disciplineDescription = nl2br(htmlentities($_POST['disciplineDescription'], ENT_QUOTES, 'UTF-8'));
$disciplineImg = $_POST['disciplineImg'];

//  SQL Statement to update record
$query = "UPDATE `tblDiscipline` SET disciplineName='$disciplineName', disciplineType='$disciplineType', disciplineShortDesc='$disciplineShortDesc', disciplineDescription='$disciplineDescription', disciplineImg='$disciplineImg' WHERE disciplineID='$id'";

//Perform SQL Statement in Database
$result = $db->query($query);
    if ($result)
      header( "refresh:5;url=entrydisciplinechoice.php" );
      echo $disciplineName . " - record updated successfully. You will be re-directed after 5 seconds. If you have not been redirected, <a href='entrydisciplinechoice.php'>Click Here</a>";
  $db->close();

?>