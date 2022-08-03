<?php

include "../../assets/scripts-php/validate_session.php";
include "../../assets/scripts-php/db_connect.php";

$data = isset(
	$_SESSION["id"],
	$_POST["contact_id"],
	$_POST["name"],
	$_POST["phone_number"],
	$_POST["email"]
);


if ( $data ) {
	$query = "
		UPDATE
			contact
		SET
			name = :name,
			phone_number = :phone_number,
			email = :email
		WHERE
			id_user = :id_user AND id = :id
	";

	$responseQuery = $DB->prepare( $query );
	$responseQuery->execute( array(
		"name" => $_POST["name"],
		"phone_number" => $_POST["phone_number"],
		"email" => $_POST["email"],
		"id_user" => $_SESSION["id"],
		"id" => $_POST["contact_id"]
	) );

	$responseQuery->closeCursor();
	$DB = null;

	echo "update ok";
} else
	echo "update fail";