<?php

$db = @new mysqli('127.0.0.1', 'root', '', 'mydb');
if (mysqli_connect_errno() != 0) {
    $meldung = 'Die Datenbank konnte nicht erreicht werden. Folgender Fehler trat auf: ' . mysqli_connect_errno() . ' : ' . mysqli_connect_error();
}

$result = $db->query('set name utf8');
?>
