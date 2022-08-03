<?php
    include "assets/scripts-php/session_start.php";

	if ( isset($_SESSION["name"]) )
		header( "Location:contacts/contacts.php" );
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sign in</title>
		<link rel="shorcut icon" type="image/x-icon" href="assets/css/img/ico.svg">
		<link rel="stylesheet" href="assets/css/form_style.css">

		<meta name="author" content="Ángel D. Hurtado">
        <meta name="keywords" content="contact, contacts, book">
        <meta name="description" content="contact book">
	</head>
	<body>
		<h1>Log in</h1>
		<form action="session/log-in/log_in.php" method="POST">
			<div class="inputs">
				<input type="email" name="email" placeholder="Email" maxlength="40" autofocus required>
				<input type="password" placeholder="Pass" name="pass" maxlength="18" required>
			</div>
			<input type="submit" value="Log in">
		</form>
		<div class="link">
			<a href="session/sign-in/sign_in.php">Sign in</a>
		</div>
	</body>
</html>