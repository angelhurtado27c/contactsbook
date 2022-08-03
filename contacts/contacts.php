<?php include "../assets/scripts-php/validate_session.php"; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Contacts</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="shorcut icon" type="image/x-icon" href="../../assets/css/img/ico.svg">
	</head>
	<body>
		<div class="content">
			<header>
				<nav>
					<a href="#$addForm">Add contact</a>
					<a href="../session/session_destroy.php">Log out</a>
				</nav>
				<div></div>
			</header>
			<div id="$contacts"></div>
			<form action="php/add.php" mehotd="POST" id="$addForm">
				<div>
					<input type="text" name="name" placeholder="Name" maxlength="20" required>
				</div>
				<div>
					<input type="number" name="phone_number" placeholder="Phone number" minlength="7" maxlength="10" required>
				</div>
				<div class="end">
					<input type="email" name="email" placeholder="Email" maxlength="40">
					<input type="submit" value="Add" id="$add">
				</div>
			</form>
		</div>
		<script src="js/main.js" type="module"></script>
	</body>
</html>