<?php

$data = isset(
	$_POST["name"],
	$_POST["last_name"],
	$_POST["email"],
	$_POST["pass"]
);

if ( $data == 1 ) {
	include "../../assets/scripts-php/db_connect.php";

	if ( email_not_exist($_POST["email"], $DB) ) {
		register_user( $DB );
		$id = get_id_user( $DB );

		include "../../assets/scripts-php/session_start.php";
		$_SESSION["name"] = $_POST["name"];
		$_SESSION["id"] = $id;

		header( "Location:../../contacts/contacts.php" );
	} else
		header( "Location:sign_in.php" );

	$DB = null;
} else
	header( "Location:sign_in.php" );




function email_not_exist( $email, $DB ) {
	$query = "SELECT id FROM user WHERE email = :email";
	$responseQuery = $DB->prepare( $query );
	$responseQuery->execute( array( "email" => $email ) );
	$id = $responseQuery->fetch( PDO::FETCH_ASSOC );
	$responseQuery->closeCursor();
	return gettype($id) == "array" ? 0 : 1;
}




function register_user( $DB ) {
	$query = "INSERT INTO user
		( email, pass, name, last_name )
	VALUES
		( :email, :pass, :name, :last_name )";

	$responseQuery = $DB->prepare( $query );
	$responseQuery->execute(array(
		"email" => $_POST["email"],
		"pass" => $_POST["pass"],
		"name" => $_POST["name"],
		"last_name" => $_POST["last_name"]
	));

	$responseQuery->closeCursor();
}




function get_id_user( $DB ) {
	$query = "SELECT id FROM user WHERE email = :email";
	$responseQuery = $DB->prepare( $query );
	$responseQuery->execute( array( "email" => $_POST["email"] ) );
	$id = $responseQuery->fetch( PDO::FETCH_ASSOC )["id"];
	$responseQuery->closeCursor();
	return $id;
}