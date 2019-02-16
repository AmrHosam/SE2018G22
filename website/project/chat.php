<?php  session_start();
if (isset($_SESSION['email'])) {
if (strpos($_SESSION['email'], "@employees.com") !== false) {
header("location: requests.php");}
include_once('components/navSign.php');
//echo $_SESSION['name'];
//echo $_SESSION['id'];
}
else {header("location: index.php");}
?>

<html style="height: 100% !important;">
	<head>
	<meta name="keyword" content="questions,enquiries,inqiries,studentaffairs">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enquiries</title>
		<style type="text/css" media="screen">
			.chat_time
			{
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
			.left
			{
			/*	border-right: 1.5px solid grey;
				border-spacing: 10px;*/
				/*overflow-y: scroll;*/
				height: 550px;
			}
			.right
			{
			/*	overflow-y: auto;
			*/	/*height: 550px;*/
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
				height: 400px;
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

			    @media only screen and (max-width: 991px) {
			    	.right
			    	{
			    		width: 70% !important;
			    	}
    }

    @media only screen and (max-width: 765px) {
    	.right
    	{
    		width: 100% !important;
    	}
    	.txt
    	{
    		width: 80% !important;
    	}
    	.submit
    	{
    		width: 15% !important;
    	}
    }

    @media only screen and (max-width: 420px) {
    	.txt
    	{
    		width: 70% !important;
    	}
    	.submit
    	{
    		width: 25% !important;
    	}
    }
		</style>
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
				}
			}
			
			//Gets the current messages from the server
			function getChatText() {
				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
					receiveReq.open("GET", 'controllers/getChat.php?chat=1&last=' + lastMessage, true);
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
					sendReq.open("POST", 'controllers/getChat.php?chat=1&last=' + lastMessage, true);
					sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					sendReq.onreadystatechange = handleSendChat; 
					var param = 'message=' + document.getElementById('txt_message').value;
					param += '&name=Hamada';
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
			function handleReceiveChat() {
				if (receiveReq.readyState == 4) {
					//Get a reference to our chat container div for easy access
					var chat_div = document.getElementById('div_chat');
					//Get the AJAX response and run the JavaScript evaluation function
					//on it to turn it into a useable object.  Notice since we are passing
					//in the JSON value as a string we need to wrap it in parentheses
					var response = eval("(" + receiveReq.responseText + ")");
					for(i=0;i < response.messages.message.length; i++) {
						chat_div.innerHTML +="<div class=''><p class='sender' >"+ response.messages.message[i].user+'&nbsp;&nbsp;<font class="chat_time">' +  response.messages.message[i].time + '</font><br /></p>'+response.messages.message[i].text + '<br /></div>';
						//chat_div.innerHTML += '&nbsp;&nbsp;<font class="chat_time">' +  response.messages.message[i].time + '</font><br /></p>';
						//chat_div.innerHTML += response.messages.message[i].text + '<br /></div>';
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
			// 		sendReq.open("POST", 'controllers/getChat.php?chat=1&last=' + lastMessage, true);
			// 		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// 		sendReq.onreadystatechange = handleResetChat; 
			// 		var param = 'action=reset';
			// 		sendReq.send(param);
			// 		document.getElementById('txt_message').value = '';
			// 	}							
			// }
			// //This function handles the response after the page has been refreshed.
			// function handleResetChat() {
			// 	document.getElementById('div_chat').innerHTML = '';
			// 	getChatText();
			// }	
		</script>
	</head>
	<body onLoad="javascript:startChat();" style="height:100%;">
		<div class="container-fluid" style="margin-top: 10px;">
			<div class="row" style="width: 100%;">
				<div id="" class="right" style="width: 50%; margin-left: 10px;">
					<div class="bar" style="">
						<p style="text-align: center; font-size: 20px;">Student Affairs Department</p>
					</div>
					<hr style="border-color: black !important; border-width: 1.5px;">
					<div id="div_chat" style="overflow-y: scroll; height: 400px !important;"></div>
					<hr style="border-color: black !important; border-width: 1.5px;">
				
					<form id="frmmain" name="frmmain" onSubmit="return blockSubmit();" style="height: 50px;">
						<!-- <input type="button" name="btn_get_chat" id="btn_get_chat" value="Refresh Chat" onClick="javascript:getChatText();" /> -->
						<!-- <input type="button" name="btn_reset_chat" id="btn_reset_chat" value="Reset Chat" onClick="javascript:resetChat();" /><br /> -->
						<input class="txt" type="text" id="txt_message" name="txt_message"  style="width: 80%;" />
						<input class="submit" type="button" name="btn_send_chat" id="btn_send_chat" value="Send" onClick="javascript:sendChatText();" />
					</form>
				</div>
			</div>
		</div>
	</body>
	
</html>
