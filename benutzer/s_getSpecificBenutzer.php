<?php
require('../libraries/connection.php');

$_uid = $_POST['id'];
$meldung = "";
$db_values = "";
$i = 0;

$query = "SELECT * FROM benutzer WHERE uid=$_uid";

$ergebnis = $db->query($query);
$anzZeilen = mysqli_num_rows($ergebnis);

if (!$ergebnis) {
    $meldung = mysqli_error($db);
} else {
    while ($i < $anzZeilen) {
        $row = $ergebnis->fetch_array();
        $db_values[$i] = array($row['email'], $row['vorname'], $row['nachname'], $row['benutzername'], $row['passwort']);
        $i++;
    }
}

echo json_encode(array("meldung" => $meldung, "DBValues" => $db_values, "query" => $query, "anz" => $anzZeilen));
$db->close();
