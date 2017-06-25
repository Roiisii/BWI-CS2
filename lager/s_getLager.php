<?php
require('../libraries/connection.php');

$_regal = $_POST['regalNr'];
$meldung = "";
$db_values = "";
$i = 0;

$query = "SELECT titel, lagerplatznummer FROM produkt WHERE lagerplatznummer LIKE '$_regal%'";

$ergebnis = $db->query($query);
$anzZeilen = mysqli_num_rows($ergebnis);

if (!$ergebnis) {
    $meldung = mysqli_error($db);
} else {
    while ($i < $anzZeilen) {
        $row = $ergebnis->fetch_array();
        $db_values[$i] = array($row['titel'], $row['lagerplatznummer']);
        $i++;
    }
}

echo json_encode(array("meldung" => $meldung, "DBValues" => $db_values, "query" => $query, "anz" => $anzZeilen));
$db->close();
