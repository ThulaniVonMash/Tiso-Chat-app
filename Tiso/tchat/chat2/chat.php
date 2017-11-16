<?php
session_start();
require_once('../googleAuth/settings.php');
require_once('../googleAuth/google-login-api.php');



if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);

		

		// Now that the user is logged  start some session variables
		$_SESSION['username'] = $user_info['name']['givenName'];
  
		;
	}
	catch(Exception $e) {
		
session_unset(); 
			$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '../loginReg/logout.php';
header("Location: http://$host$uri/$extra");
exit;
	}
}


if(!isset($_SESSION['username']) )
{
	$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '../loginReg/logout.php';
header("Location: http://$host$uri/$extra");
exit;
}


?>
<html>
	<head>
		<title>Tiso Chat </title>
		<style type="text/css" media="screen">
			.chat_time {
				font-style: italic;
				font-size: 9px;
			}
		</style>
		<link rel="stylesheet" href="css/chat.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script language="JavaScript" type="text/javascript">
			var sendReq = getXmlHttpRequestObject();
			var receiveReq = getXmlHttpRequestObject();
			var lastMessage = 0;
			var mTimer;
			//Function for initializating the page.
			function startChat() {
				//Set the focus to the Message Box.
				document.getElementById('txt_message').focus();
				//Start Recieving Messages.
				getChatText();
			}		
			//Gets the browser specific XmlHttpRequest Object
			function getXmlHttpRequestObject() {
				if (window.XMLHttpRequest) {
					return new XMLHttpRequest();
				} else if(window.ActiveXObject) {
					return new ActiveXObject("Microsoft.XMLHTTP");
				} else {
					document.getElementById('p_status').innerHTML = 'Status: Cound not create XmlHttpRequest Object.  Consider upgrading your browser.';
				}
			}
			
			//Gets the current messages from the server
			function getChatText() {
				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
					receiveReq.open("GET", 'getChat.php?chat=1&last=' + lastMessage, true);
					receiveReq.onreadystatechange = handleReceiveChat; 
					receiveReq.send(null);
				}			
			}
			//Add a message to the chat server.
			function sendChatText() {
				if(document.getElementById('txt_message').value == '') {
					alert("You have not entered a message");
					return;
				}
				if (sendReq.readyState == 4 || sendReq.readyState == 0) {
				
					sendReq.open("POST", 'getChat.php?chat=1&last=' + lastMessage, true);					
				    sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					sendReq.onreadystatechange = handleSendChat; 
				
					var param = 'message=' + document.getElementById('txt_message').value;
					param += '&name='+$("#username").text();;
					param += '&chat=1';
					sendReq.send(param);
					
					
					
					document.getElementById('txt_message').value = '';
					
				}							
			}
			//When our message has been sent, update our page.
			function handleSendChat() {
				//Clear out the existing timer so we don't have 
				//multiple timer instances running.
				clearInterval(mTimer);
				getChatText();
			}
			//Function for handling the return of chat text
			function handleReceiveChat() {
				if (receiveReq.readyState == 4 && receiveReq.status == 200) {
					var chat_div = document.getElementById('div_chat');
					var xmldoc = receiveReq.responseXML;
				
				//alert(receiveReq.responseText);
					var message_nodes = xmldoc.getElementsByTagName("message"); 
				    
				//alert(message_nodes[0].getElementsByTagName("user"));
					var n_messages = message_nodes.length
					var colours = ["#FFFFE0", "#e6fee6"];
					var col;
					for (i = 0; i < n_messages; i++) {
						
						var user_node = message_nodes[i].getElementsByTagName("user");
						var text_node = message_nodes[i].getElementsByTagName("text");
						var time_node = message_nodes[i].getElementsByTagName("time");
						
						
						
						if((i%2)==0){
							col=colours[0];
						}else
						{
							col=colours[1];
						}
						chat_div.innerHTML += '<div style=background-color:'+ col+'><b>'+ user_node[0].firstChild.nodeValue +'</b>'+ '&nbsp;'+'<font class="chat_time">' + time_node[0].firstChild.nodeValue + '</font>'+ '</br>'+text_node[0].firstChild.nodeValue + '</br></br></div>';
						
						
						chat_div.scrollTop = chat_div.scrollHeight;
						lastMessage = (message_nodes[i].getAttribute('id'));
					}
					mTimer = setTimeout('getChatText();',2000); //Refresh our chat in 2 seconds
				}
			}
			//This functions handles when the user presses enter.  Instead of submitting the form, we
			//send a new message to the server and return false.
			function blockSubmit() {
				sendChatText();
				return false;
			}
			//This cleans out the database so we can start a new chat session.
			function resetChat() {
				if (sendReq.readyState == 4 || sendReq.readyState == 0) {
					sendReq.open("POST", 'getChat.php?chat=1&last=' + lastMessage, true);
					sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					sendReq.onreadystatechange = handleResetChat; 
					var param = 'action=reset';
					sendReq.send(param);
					document.getElementById('txt_message').value = '';
				}							
			}
			//This function handles the response after the page has been refreshed.
			function handleResetChat() {
				document.getElementById('div_chat').innerHTML = '';
				getChatText();
			}	
			
			
			function logout(){
				clearTimeout(mTimer);
				sendReq.open("POST",'../loginReg/logout.php');
				sendReq.send();
				window.location = "../loginReg/login.php";
			}
		</script>
	</head>
	<body onload="javascript:startChat();">
	
	
	<div id="topnav">
	<h1>Welocome: <?php echo $_SESSION['username']; ?>
		<div id="username" hidden=true>	<?php echo $_SESSION['username']; ?>
			</div>
			
		<input  type="button" name="logout" value="Log Out" onclick=javascript:logout(); style="position: absolute;
    right: 0px;
    width: 100px;" />
	
		
			
		</h1>
		
</div>


	<div id="back-container">
	<div id="trans">
  <div id="container">
	
		
		
		
		<br>
		<div id="div_chat" style=" overflow: auto; background-color: #F0F8FF; width: 90%;height:90%; ">
			
		</div>
		<form id="frmmain" name="frmmain" onsubmit="return blockSubmit();">
			
			<input type="text" id="txt_message" name="txt_message" style="width: 70%;" />
			<input type="button" class=" col-lg-4 text-right btn   send-message-btn pull-right" name="btn_send_chat" id="btn_send_chat" value="Send" onclick="javascript:sendChatText();" />
		</form>
		
		</div>
		</div>
		</div>
		
	</body>
	
</html>