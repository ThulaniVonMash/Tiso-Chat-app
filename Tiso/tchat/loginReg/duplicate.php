<?php
include("../databaseconn/conn.php");


if (isset($_POST['username'])){
		
		$username = stripslashes($_POST['username']); // removes backslashes
		$username = mysqli_real_escape_string($link,$username); //escapes special characters in a string
		
		$query = "SELECT * FROM `users` WHERE username='".$username."'";
		$result = mysqli_query($link,$query);
		echo mysqli_num_rows($result);
     
	  
		}

?>