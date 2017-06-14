<?php

$db = @new mysqli('wi-projectdb.technikum-wien.at:3306', 's17-bbb2-fst-33', 'DbPass4b233', 's17-bbb2-fst-30', '3306');
//$db = @new mysqli('10.128.4.50', 's17-bbb2-fst-33', 'DbPass4b233', 's17-bbb2-fst-30', '3306');
if (mysqli_connect_errno() != 0) {
    $meldung = 'Die Datenbank konnte nicht erreicht werden. Folgender Fehler trat auf: ' . mysqli_connect_errno() . ' : ' . mysqli_connect_error();
}

$result = $db->query('set name utf8');
?>
