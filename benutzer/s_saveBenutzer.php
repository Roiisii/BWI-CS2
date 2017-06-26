<?php

require('../libraries/connection.php');

$_id = $_POST['id'];
$_bname = $_POST['bname'];
$_vname = $_POST['vname'];
$_nname = $_POST['nname'];
$_email = $_POST['email'];
$_pw = $_POST['pw'];
$_pwHash = $_POST['pwHash'];
$_mode = $_POST['mode'];
$meldung = "";
$query = "";

//Edit
if ($_mode == 1) {
    if (password_verify($_pw, $_pwHash)) {
        $_pw = password_hash($_pw, PASSWORD_DEFAULT);
        $query = "UPDATE benutzer SET email='$_email', passwort='$_pw', vorname='$_vname', nachname='$_nname', benutzername='$_bname' WHERE uid = $_id";
        $ergebnis = $db->query($query);
        if (!$ergebnis) {
            $meldung = mysqli_error($db);
        } else {
            $meldung = "ok";
        }
    } else {
        $meldung = "&mdash; Falsches Passwort!";
    }
} else { //New
    $_pw = password_hash($_pw, PASSWORD_DEFAULT);
    $query = "INSERT INTO benutzer (email, passwort, vorname, nachname, benutzername) VALUES ('$_email', '$_pw', '$_vname', '$_nname', '$_bname')";
    $ergebnis = $db->query($query);
    if (!$ergebnis) {
        $meldung = mysqli_error($db);
    } else {
        $meldung = "ok";
    }
}

echo json_encode(array("meldung" => $meldung, "query" => $query));
$db->close();
