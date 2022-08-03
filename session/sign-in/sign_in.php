<?php
    include "../../assets/scripts-php/session_start.php";

	if ( isset($_SESSION["name"]) )
		header( "Location:../../contacts/contacts.php" );
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sign in</title>
		<link rel="stylesheet" href="../../assets/css/form_style.css">
		<style>
			@media screen and ( max-height: 430px ) {
				body {
					position: static;
				}
			}

			@media screen and ( max-width: 300px ) {
				body { right: auto; }

				@media screen and ( max-height: 430px ) {
					body {
						position: absolute;
						bottom: auto;
					}
				}
			}
		</style>
		<link rel="shorcut icon" type="image/x-icon" href="../../assets/css/img/ico.svg">
	</head>
	<body>
		<h1>Sign in</h1>
		<form action="server_sign_in.php" method="POST">
			<div class="inputs">
				<input type="text" name="name" placeholder="Name" required maxlength="20" autofocus>
				<input type="text" name="last_name" placeholder="Last name" maxlength="20" required>
				<input type="email" name="email" placeholder="Email" maxlength="40" required>
				<input type="password" name="pass" placeholder="Pass" maxlength="18" required>
			</div>
			<input type="submit" value="Sign in">
		</form>
		<div class="link">
			<a href="../../index.php">Log in</a>
		</div>
	</body>
</html>