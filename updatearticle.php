<?php

//Starting/Resuming Session
session_start();

// Include database connection file
include_once('inc/connection.inc.php');

$id = $_GET['id'];
$articleTitle = $_POST['articleTitle'];
$articleType = $_POST['articleType'];
$articleImg = $_POST['articleImg'];
$articleContent = nl2br(htmlentities($_POST['articleContent'], ENT_QUOTES, 'UTF-8'));

//  SQL Statement to update record
$query = "UPDATE `tblArticle` SET articleTitle='$articleTitle', articleType='$articleType', articleImg='$articleImg', articleContent='$articleContent' WHERE articleID='$id'";

//Perform SQL Statement in Database
$result = $db->query($query);
    if ($result)
      header( "refresh:5;url=entryarticlechoice.php" );
      echo $articleTitle . " - record updated successfully. You will be re-directed after 5 seconds. If you have not been redirected, <a href='entryarticlechoice.php'>Click Here</a>";
  $db->close();

?>