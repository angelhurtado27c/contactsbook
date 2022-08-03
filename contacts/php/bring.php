<?php

include "../../assets/scripts-php/validate_session.php";
include "../../assets/scripts-php/db_connect.php";

$start = $_POST["start"];
$quantity = $_POST["quantity"];
// $query = "SELECT name, phone_number, email, id FROM contact WHERE id_user = :id LIMIT $start,$quantity";
$query = "SELECT name, phone_number, email, id FROM contact WHERE id_user = :id";

$responseQuery = $DB->prepare( $query );
$responseQuery->execute( array(
	"id" => $_SESSION["id"]
) );

$users = $responseQuery->fetchAll( PDO::FETCH_ASSOC );
echo json_encode( $users );

$responseQuery->closeCursor();
$DB = null;