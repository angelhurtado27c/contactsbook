<?php

include "../../assets/scripts-php/validate_session.php";
include "../../assets/scripts-php/db_connect.php";

$data = isset(
	$_SESSION["id"],
	$_POST["name"],
	$_POST["phone_number"],
	$_POST["email"]
);

if ( $data ) {
	$query = "INSERT INTO contact
		( id_user, phone_number, name, email )
	VALUES
		( :id_user, :phone_number, :name, :email )";

    $responseQuery = $DB->prepare( $query );
	$responseQuery->execute(array(
		"id_user" => $_SESSION["id"],
		"phone_number" => $_POST["phone_number"],
		"email" => $_POST["email"],
		"name" => $_POST["name"]
	));

	$query = "SELECT MAX(id) FROM contact WHERE id_user = :id_user";
	$responseQuery = $DB->prepare( $query );
	$responseQuery->execute(array( "id_user" => $_SESSION["id"] ));
	$id = $responseQuery->fetch( PDO::FETCH_ASSOC );
	echo $id["MAX(id)"];

	$responseQuery->closeCursor();
	$DB = null;
} else
	echo "add fail";