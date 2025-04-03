<?php
//error_log("A afficher : " . print_r($data, 1));
//error_log("SESSION : " . $_SESSION['color']);
?>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<title>Messagerie instantanee</title>
	<!-- BOOTSTRAP CORE STYLE  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- CUSTOM STYLE  -->
	<link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-3">
				<h5 style="color:green">Bienvenue</h5>
				<?php
				foreach ($data['rooms'] as $room) {
				?>
					<div style="margin-bottom: 10px">
						<a href="<?php echo $room['room_id']; ?>"><?php echo $room['room_name'] ?></a>
					</div>
				<?php
				}
				?>
				<hr>
				<div><a href="../search">Rechercher</a>
				</div>
			</div>

			<div class="col-9">
				<h4>Vous discutez dans la room "<?php echo $data['currentroom']; ?>"</h4>
				<div id="currentRoom" value="<?php echo $data['currentroomid']; ?>"></div>
				<div class="chat-wrapper">
					<div id="message-box">
						<?php foreach ($data['messages'] as $msg) { ?>
							<div><span class="user_name" style="color:<?php echo $msg['msg_color']; ?>"><?php echo $msg['user_name']; ?></span>
								<span style="color:<?php echo $msg['msg_color']; ?>"><i><?php echo date('d/m/Y H:i:s', $msg['msg_date']); ?></i></span> :<br>
								<span class=" user_message"> <?php echo $msg['msg_text']; ?> </span>
							</div>
						<?php } ?>

					</div>
					<div class="user-panel">
						<input type="text" name="name" id="name" value="<?php echo $data['user']; ?> " />
						<input type="text" name="message" id="message" placeholder="Message ici..." maxlength="200" />
						<input type="hidden" name="color" id="color" value="<?php echo isset($_SESSION['color']) ? $_SESSION['color'] : 1; ?> " />
						<input type="hidden" name="room" id="room" value="<?php echo $data['currentroomid']; ?>" />
						<button id="send-message">Envoyer</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="/projet_gorille/chatmvc/public/js/chat.js"></script>

</html>