<?php
require('../libraries/connection.php');

$meldung = "";
$db_values = "";
$i = 0;

$query = "SELECT pid, titel FROM produkt WHERE lagerplatznummer = ''";

$ergebnis = $db->query($query);
$anzZeilen = mysqli_num_rows($ergebnis);

if (!$ergebnis) {
    $meldung = mysqli_error($db);
} else {
    while ($i < $anzZeilen) {
        $row = $ergebnis->fetch_array();
        $db_values[$i] = array($row['titel'], $row['pid']);
        $i++;
    }
}

echo json_encode(array("meldung" => $meldung, "DBValues" => $db_values, "query" => $query, "anz" => $anzZeilen));
$db->close();
