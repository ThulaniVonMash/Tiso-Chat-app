<?php
	require('../databaseconn/conn.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username']) && isset($_POST['password']) ){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($link,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($link,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		
		$result = mysqli_query($link,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			echo "1";
            }else{
				echo "0";
				}
    }else{
		echo "1";
	}