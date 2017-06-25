<?php
require('../libraries/connection.php');

$_platz = $_POST['platz'];
$meldung = "";
$db_values = "";
$i = 0;

$query = "UPDATE produkt SET lagerplatznummer = '' WHERE lagerplatznummer = '$_platz'";

$ergebnis = $db->query($query);

if (!$ergebnis) {
    $meldung = mysqli_error($db);
} else {
    $meldung = "ok";
}

echo json_encode(array("meldung" => $meldung, "query" => $query));
$db->close();
