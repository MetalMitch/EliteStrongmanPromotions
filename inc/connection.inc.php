<?php

{
	$db = new mysqli('localhost','mskee','12406','mskee_esp');
	
	if (mysqli_connect_errno()) 
  {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
	
}


?>