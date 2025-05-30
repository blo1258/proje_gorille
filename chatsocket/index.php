<?php
$colors = array('#007AFF', '#FF7000', '#FF7000', '#15E25F', '#CFC700', '#CFC700', '#CF1100', '#CF00BE', '#F00');
$color_pick = array_rand($colors);
?>

<!DOCTYPE html>
<html>

<head>
	<title>WebSocket Chat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../chatmvc/public/css/style.css">
</head>

<body>

	<div class="chat-wrapper">
		<div id="message-box"></div>
		<div class="user-panel">
			<input type="text" name="name" id="name" placeholder="Your Name" maxlength="15" />
			<input type="text" name="message" id="message" placeholder="Type your message here..." maxlength="100" />
			<button id="send-message">Send</button>
		</div>
	</div>
	
	<script language="javascript" type="text/javascript">

		//create a new WebSocket object.
		var msgBox = $('#message-box');
		var wsUri = "ws://localhost:9000/server.php";
		websocket = new WebSocket(wsUri);

		websocket.onopen = function(ev) { // connection is open 
			msgBox.append('<div class="system_msg" style="color:#bbbbbb">Welcome to my "Demo WebSocket Chat box"!</div>'); //notify user
		}
		// Message received from server
		websocket.onmessage = function(ev) {
			var response = JSON.parse(ev.data); //PHP sends Json data

			var res_type = response.type; //message type
			var user_message = response.message; //message text
			var user_name = response.name; //user name
			var user_color = response.color; //color
			var message_date = response.date; //date

			switch (res_type) {
				case 'usermsg':
					msgBox.append('<div><span class="user_name" style="color:' + user_color + '">' + user_name + '</span> : <span class="user_message">'+'</span> (<span class="message_date" style="color:' + user_color + '">' + message_date + '</span>) : <span class="user_message">' + user_message + '</span></div>');
					break;
				case 'system':
					msgBox.append('<div style="color:#bbbbbb">' + user_message + '</div>');
					break;
			}
			msgBox[0].scrollTop = msgBox[0].scrollHeight; //scroll message 

		};

		websocket.onerror = function(ev) {
			msgBox.append('<div class="system_error">Error Occurred - ' + ev.data + '</div>');
		};
		websocket.onclose = function(ev) {
			msgBox.append('<div class="system_msg">Connection Closed</div>');
		};

		//Message send button
		$('#send-message').click(function() {
			send_message();
		});

		//User hits enter key 
		$("#message").on("keydown", function(event) {
			if (event.which == 13) {
				send_message();
			}
		});

		//Send message
		function send_message() {
			var message_input = $('#message'); //user message text
			var name_input = $('#name'); //user name

			if (message_input.val() == "") { //empty name?
				alert("Enter your Name please!");
				return;
			}
			if (message_input.val() == "") { //emtpy message?
				alert("Enter Some message Please!");
				return;
			}

			//prepare json data
			var msg = {
				message: message_input.val(),
				name: name_input.val(),
				color: '<?php echo $colors[$color_pick]; ?>'
			};

			// Envoyr les données du message à la base de données
			//convert and send data to server
			websocket.send(JSON.stringify(msg));
			message_input.val(''); //reset message input
		}
	</script>
</body>

</html>