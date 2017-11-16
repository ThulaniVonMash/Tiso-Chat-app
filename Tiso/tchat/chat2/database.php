<?php
//Make the database connection.
include("../databaseconn/conn.php");


  
  
  function db_connect( $database = 'tiso-db' ) {
   // global $$link;

    if ($GLOBALS['link'])
    { 
    mysqli_select_db( $GLOBALS['link'], $database);
	//echo "Connection succesful to the the database";

}else{
	echo "Database not selected";
}
    return $GLOBALS['link'];
  }
//Function to handle database errors.
  function db_error($query, $errno, $error) { 
    die('<font color="#000000"><b>' . $errno . ' - ' . $error . '<br><br>' . $query . '<br><br><small><font color="#ff0000">[STOP]</font></small><br><br></b></font>');
  }
//Function to query the database.
  function db_query($query) {
  //  global $$link;

    $result = mysqli_query( $GLOBALS['link'],$query) or db_error($query, mysqli_errno(), mysqli_error());

    return $result;
  }
//Get a row from the database query
  function db_fetch_array($db_query) {
    return mysqli_fetch_array($db_query, MYSQL_ASSOC);
  }
//The the number of rows returned from the query.
  function db_num_rows($db_query) {
    return mysqli_num_rows($db_query);
  }
//Get the last auto_increment ID.
  function db_insert_id() {
    return mysqli_insert_id();
  }
//Add HTML character incoding to strings
  function db_output($string) {
    return htmlspecialchars($string);
  }
//Add slashes to incoming data
  function db_input($string) {
  //  global $$link;

    if (function_exists('mysql_real_escape_string')) {
      return mysqli_real_escape_string($GLOBALS['link'], $string);
      
    } elseif (function_exists('mysql_escape_string')) {
      return mysqli_escape_string($string);
    }

    return addslashes($string);
  }


?>