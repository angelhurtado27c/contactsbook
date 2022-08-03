<?php

$data = isset(
	$_POST["email"],
	$_POST["pass"]
);

if ( $data == 1 ) {
	include "../../assets/scripts-php/db_connect.php";

	$query = "SELECT name, id FROM user WHERE email = :email AND pass = :pass";
	$responseQuery = $DB->prepare( $query );
	$responseQuery->execute( array(
		"email" => $_POST["email"],
		"pass" => $_POST["pass"]
	) );

    if ( $user = $responseQuery->fetch(PDO::FETCH_ASSOC) ) {
        include "../../assets/scripts-php/session_start.php";
		$_SESSION["name"] = $user["name"];
		$_SESSION["id"] = $user["id"];
		header( "Location:/../../contacts/contacts.php" );
	} else
		header( "Location:/" );

	$responseQuery->closeCursor();
	$DB = null;
} else
	header( "Location:/" );