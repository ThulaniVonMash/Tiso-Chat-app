<?php




//You will need to replace the parameters below with the values for your database connection
//server = the database server (usually localhost).
//username = The user name to connect to the database.
//password = The password to connect to the database.
$link = mysqli_connect("localhost","root","","tiso-db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
