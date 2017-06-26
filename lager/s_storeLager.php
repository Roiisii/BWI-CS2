<?php
require('../libraries/connection.php');

$_fach = $_POST['fach'];
$_pid = $_POST['id'];
$meldung = "";
$db_values = "";
$i = 0;

$query = "UPDATE produkt SET lagerplatznummer = '$_fach' WHERE pid = $_pid";

$ergebnis = $db->query($query);

if (!$ergebnis) {
    $meldung = mysqli_error($db);
} else {
    $meldung = "ok";
}

echo json_encode(array("meldung" => $meldung, "query" => $query));
$db->close();
