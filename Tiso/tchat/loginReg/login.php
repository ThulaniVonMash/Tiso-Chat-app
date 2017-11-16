<?php
require_once('../googleAuth/settings.php');

$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';
?>
<!DOCTYPE html>
<html>
<head>

     
 
<link rel="icon" href="image/favicon.png">

     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script>
  
  
  
  
  $(document).ready(function(){  

document.getElementById("myForm").onsubmit{


//alert(document.getElementById('username').value);
  var username = document.getElementById('username').value;
  var message = document.getElementById('confirmUsername');
  
  /*This is just to see how it works, remove this lines*/
 // message.innerHTML = username.value;
 // document.getElementById("send").disabled = true;  
  /*********************************************/

 $.ajax({ 
    url : "check.php",// your username checker url
    type : "POST",
    data : {username: username, password:password},        
    success:  function (response) {						
        if (response==0)
        {
              message.innerHTML = "Incorrect username or password";
             	
	}
	if (response==1)
	{
             window.location = "../chat2/chat.php";
   	}
					
							
     }
 }); 
 };
 });					

  
  
  </script>

<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>







<div id="topnav">
<h1 >Thulani Mashiane's Assesment: tiso blackstar group.</h1></br>
</div>

<div id="back-container">
<div id="trans">
<div id="container">

<div class="form">

<h1>Log In</h1>
<form action="" method="post" name="login" >
<span id="incorrect"  style="color:#fe012e"></span>
<input id="username" type="text" name="username" placeholder="Username" required />
<input id="password"type="password" name="password" placeholder="Password" required />
</br>
<input name="submit" type="submit" value="Login" /> 

<a href="<?= $login_url ?>" style="hover"><img  alt="Google Login" src="image/googleLoginU.png"   ></a>


</form>

<p>Not registered yet? <a href='registration.php'>Register Here</a></p>



</div>
</div>
</div>


</div>

</body>
</html>
