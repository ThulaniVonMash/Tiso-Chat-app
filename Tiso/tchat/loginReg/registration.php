

<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<meta charset="utf-8">
<title>Registration</title>

<link rel="stylesheet" href="css/style.css" />
<link rel="icon" href="image/favicon.png">
<script>

 $(document).ready(function(){  

$('#username').blur(function(){


//alert(document.getElementById('username').value);
  var username = document.getElementById('username').value;
  var message = document.getElementById('confirmUsername');
  
  /*This is just to see how it works, remove this lines*/
 // message.innerHTML = username.value;
 // document.getElementById("send").disabled = true;  
  /*********************************************/

 $.ajax({ 
    url : "duplicate.php",// your username checker url
    type : "POST",
    data : {username: username},        
    success:  function (response) {						
        if (response==0)
        {
               message.innerHTML = "";
              document.getElementById("send").disabled = false;		
	}
	if (response==1)
	{
              message.innerHTML = "Username exists, please select a different name";
              document.getElementById("send").disabled = true;	
   	}
					
							
     }
 }); 
 });
 });					


</script>

</head>
<body>
<?php





	require('../databaseconn/conn.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		
		
		
		
		
		
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($link,$username); //escapes special characters in a string
		
	
			$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($link,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($link,$password);

		$trn_date = date("Y-m-d H:i:s");
		
		
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($link,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
		
		
	  
		
		
		
    }else{
?>




<div id="back-container">

<div id="container">

<div class="form">
<h1>Registration</h1>

<form name="registration" action="" method="post">
<input id="username" class="form-control" type="text" name="username" placeholder="Username"     required/> <br>
 <span id="confirmUsername" class="confirmUsername" style="color:#fe012e"></span>

<input type="email" name="email" placeholder="Email" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input type="submit" name="submit" value="Register" id="send" />
</form>
</div>
</div>
</div>
<?php } ?>
</body>
</html>
