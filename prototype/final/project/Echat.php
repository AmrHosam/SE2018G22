<?php
	require('connect.php');
	session_start();
	$query = "SELECT chat.chat_id, chat.user_id,users.`full name` FROM chat INNER JOIN users ON users.id = chat.user_id";
	$result = mysqli_query($link,$query);
	//echo $_SESSION['name'];
	//echo $_SESSION['id'];

?>
<html style="height: 100%;">
	<head>
	<meta name="keyword" content="questions,enquiries,inqiries,studentaffairs">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enquiries</title>
						<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<style type="text/css" media="screen">
			.chat_time {
				font-style: italic;
				font-size: 9px;
			}
			/* bla bla bla */
			hr
{
	display: block;
	border-color: #DCDCDC;
}
.question
{
height: 82px;
overflow: hidden;
margin-left: 10px;
}
.username
{
	font-size:20px;
	margin-bottom: 5px;
}
.msg
{
	color: grey;
	font-size: 15px;
	margin-top: 5px;
	margin-bottom: 0px;
	color: #A9A9A9;
}
#left
{
/*	border-right: 1.5px solid grey;
	border-spacing: 10px;*/
	overflow-y: scroll;
	height: 550px;
}
#right
{
/*	overflow-y: auto;
*/	height: 550px;
}
.submit:hover
{
	cursor: pointer;
}
.submit
{
background-color: transparent;
border-radius: 7px;
border-width: 3px;
border-color: brown;
margin-left: 10px;
height: 45px;
width: 80px;
margin-top: 15px;
color: black;
font-weight: 550;
}
#answer
{
	margin-left: 12px;
	border-radius: 5px;
	border-width: 0.5px;
}
.conversation
{
	position: relative;
	height: 65%;
	overflow-y: auto;
}
.recieved
{
	background-color: #800000;
	margin: 15px;
	width: 40%;
	border-radius: 15px;
	height: auto;
	padding-bottom: 1px;
	padding-top: 1px;
}
.sent
{
	position: absolute;
	right: 5px;
	background-color: #FFF8DC;
	margin: 15px;
	width: 40%;
	border-radius: 15px;
	height: auto;
}
#response
{

}
.sender
{
	margin: 0px !important;
	font-weight: 600;
	margin-top: 20px !important;
}
::-webkit-scrollbar {
    width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: grey; 
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #696969; 
}
		</style>
		<script language="JavaScript" type="text/javascript">
			var sendReq = getXmlHttpRequestObject();
			var receiveReq = getXmlHttpRequestObject();
			var lastMessage = 0;
			var mTimer;
			var user_id;
			var chat_id;
			var name;
			//Function for initializating the page.
			function startChat() {
				//Set the focus to the Message Box.
				document.getElementById('txt_message').focus();
				//Start Recieving Messages.
				//getChatText();
			}		
			//Gets the browser specific XmlHttpRequest Object
			function getXmlHttpRequestObject() {
				if (window.XMLHttpRequest) {
					return new XMLHttpRequest();
				} else if(window.ActiveXObject) {
					return new ActiveXObject("Microsoft.XMLHTTP");
				} else {
				}
			}
			function getMessages(user,chat)
			{
				document.getElementById('div_chat').innerHTML = '';
				//document.getElementById('username').innerHTML = name;
				//alert($(this).val());
				lastMessage = 0;
				user_id = user;
				chat_id = chat;
				//alert(user);
				getChatText();
			}
			//Gets the current messages from the server
			function getChatText() {
				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
					//alert(id);
					receiveReq.open("GET", 'EgetChat.php?chat='+user_id+'&last=' + lastMessage, true);
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
					sendReq.open("POST", 'EgetChat.php?chat=1&last=' + lastMessage, true);
					sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					sendReq.onreadystatechange = handleSendChat; 
					var param = 'message=' + document.getElementById('txt_message').value;
					param += '&name=Employee';
					param += '&chat=' + user_id;
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
			function handleReceiveChat() {
				if (receiveReq.readyState == 4) {
					//Get a reference to our chat container div for easy access
					var chat_div = document.getElementById('div_chat');
					//Get the AJAX response and run the JavaScript evaluation function
					//on it to turn it into a useable object.  Notice since we are passing
					//in the JSON value as a string we need to wrap it in parentheses
					var response = eval("(" + receiveReq.responseText + ")");
					for(i=0;i < response.messages.message.length; i++) {
						chat_div.innerHTML +="<div class=''><p class='sender' >"+ response.messages.message[i].user+'&nbsp;&nbsp;<font class="chat_time">'+response.messages.message[i].time + '</font><br /></p>'+response.messages.message[i].text+'<br /></div>';
						//chat_div.innerHTML += '&nbsp;&nbsp;<font class="chat_time">' +  response.messages.message[i].time + '</font><br />';
						//chat_div.innerHTML += response.messages.message[i].text + '<br />';

						//chat_div.innerHTML +="<div class=''><p class='sender' >"+ response.messages.message[i].user+'&nbsp;&nbsp;<font class="chat_time">' +  response.messages.message[i].time + '</font><br /></p>'+response.messages.message[i].text + '<br /></div>';
						chat_div.scrollTop = chat_div.scrollHeight;
						lastMessage = response.messages.message[i].id;
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
			// function resetChat() {
			// 	if (sendReq.readyState == 4 || sendReq.readyState == 0) {
			// 		sendReq.open("POST", 'EgetChat.php?chat=1&last=' + lastMessage, true);
			// 		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// 		sendReq.onreadystatechange = handleResetChat; 
			// 		var param = 'action=reset';
			// 		sendReq.send(param);
			// 		document.getElementById('txt_message').value = '';
			// 	}							
			// }
			//This function handles the response after the page has been refreshed.
			// function handleResetChat() {
			// 	document.getElementById('div_chat').innerHTML = '';
			// 	getChatText();
			// }	
		</script>
	</head>
	<body onLoad="javascript:startChat();" style="height: 100%;">
		<div class="container-fluid" style="padding-top: 25px;">
			<div class="row" style="height: 97%">
				<div class="col-3" id="left" style="height: 100%;">
					<div class="bar">
						<p style="text-align: center; font-size: 20px; font-weight: 650;">Students</p>
					</div>
					<hr style="border-color: brown !important; border-width: 1.5px;">
					<?php while ($row = mysqli_fetch_array($result)) { ?>
					<input  type="button" style="border-color: black;border-width: 3px; height:82px;  width: 100%;cursor: pointer;border-radius: 10px;
					font-weight: 600; background-color: transparent;" id="button" name="" value="<?php echo $row['full name']; ?>" onClick="javascript:getMessages(<?php echo $row['user_id']; ?>,<?php echo $row['chat_id'];?>)"><hr style="">
					<?php } ?>
				</div>
				<div class="col-9" id="right" style="height: 100%;">
					<div class="bar" style="">
						<p style="text-align: center;font-size: 20px; font-weight: 650;" id="username">Chat</p>
					</div>
					<hr style="border-color: brown !important; border-width: 1.5px;">
		<div id="div_chat" class="conversation" style="">
		</div>
		<form id="frmmain" name="frmmain" onSubmit="return blockSubmit();">
<!-- 			<input type="button" name="btn_get_chat" id="btn_get_chat" value="Refresh Chat" onClick="javascript:getChatText();" />
			<input type="button" name="btn_reset_chat" id="btn_reset_chat" value="Reset Chat" onClick="javascript:resetChat();" /><br /> -->
			<input type="text" id="txt_message" name="txt_message" style="width: 90%;" />
			<input type="button" class="submit" name="btn_send_chat" id="btn_send_chat" value="Send" onClick="javascript:sendChatText();" />
		</form>
		</div>
</div>
</div>
	</body>
	
</html>