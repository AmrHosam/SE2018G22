<?php

//Send some headers to keep the user's browser from caching the response.
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/plain; charset=utf-8");
require('connect.php');
session_start();
//Check to see if a message was sent.
if(isset($_POST['message']) && $_POST['message'] != '') {
	//add chat_id if it  was the first message
	$query = "SELECT * FROM chat WHERE user_id=".$_SESSION['id']."";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result) == 0)
	{
		$query = "INSERT INTO chat (user_id) VALUES (".$_SESSION['id'].")";
		mysqli_query($link,$query);
		$chat_id = mysqli_insert_id($link);
	}
	else
	{
		$row = mysqli_fetch_array($result);
		$chat_id = $row['chat_id'];
	}
	$sql = "INSERT INTO message(chat_id, user_id, user_name, message, post_time) VALUES (" . 
			$chat_id . ",".$_SESSION['id']." , '" . mysqli_real_escape_string($link,$_SESSION['name']) . 
			"', '" . mysqli_real_escape_string($link,$_POST['message']) . "', NOW())";
	mysqli_query($link,$sql);
}
//Check to see if a reset request was sent.
if(isset($_POST['action']) && $_POST['action'] == 'reset') {
	$sql = "DELETE FROM message WHERE chat_id = " . mysqli_real_escape_string($link,$_GET['chat']);
	mysqli_query($link,$sql);
}

//Create the JSON response.
$json = '{"messages": {';
//Check to ensure the user is in a chat room.
if(!isset($_GET['chat'])) {
	$json .= '"message":[ {';
	$json .= '"id":  "0",
				"user": "Admin",
				"text": "You are not currently in a chat session.  &lt;a href=""&gt;Enter a chat session here&lt;/a&gt;",
				"time": "' . date('h:i') . '"
			}]';
} else {
	$last = (isset($_GET['last']) && $_GET['last'] != '') ? $_GET['last'] : 0;
	$sql = "SELECT message_id, user_name, message, date_format(post_time, '%h:%i') as post_time" . 
		" FROM message WHERE user_id = " . mysqli_real_escape_string($link,$_SESSION['id']) . " AND message_id > " . $last;
	$message_query = mysqli_query($link,$sql);
	//Loop through each message and create an XML message node for each.
	if(mysqli_num_rows($message_query) > 0) {
		$json .= '"message":[ ';	
		while($message_array = mysqli_fetch_array($message_query)) {
			$json .= '{';
			$json .= '"id":  "' . $message_array['message_id'] . '",
						"user": "' . htmlspecialchars($message_array['user_name']) . '",
						"text": "' . htmlspecialchars($message_array['message']) . '",
						"time": "' . $message_array['post_time'] . '"
					},';
		}
		$json .= ']';
	} else {
		//Send an empty message to avoid a Javascript error when we check for message lenght in the loop.
		$json .= '"message":[]';
	}
}
//Close our response
$json .= '}}';
echo $json;
?>