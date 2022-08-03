<?php

include "../../assets/scripts-php/validate_session.php";
include "../../assets/scripts-php/db_connect.php";

$data = isset(
	$_SESSION["id"],
	$_POST["ids"],
);

if ( $data ) {
	$ids = explode( ",", $_POST["ids"] );



	$query = "DELETE FROM contact WHERE (id = :id0";
	$valuesQuery = array("id_user" => $_SESSION["id"], "id0" => $ids[0]);

	for ( $i = 1; $i < count( $ids ); $i++ ) {
		$query .= " OR id = :id$i";
		$valuesQuery["id$i"] = $ids[$i];
	}

	$query .= ") AND id_user = :id_user";



	$responseQuery = $DB->prepare( $query );
	$responseQuery->execute( $valuesQuery );

	$responseQuery->closeCursor();
	$DB = null;

	echo "delete ok";
} else
	echo "delete fail";