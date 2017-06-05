<?php

if (isset($_POST['userName']) === true && empty($_POST['userName']) === false &&
        isset($_POST['password']) === true && empty($_POST['password']) === false) {
    require('../libraries/connection.php');

    $_userName = strtoupper($db->real_escape_string($_POST['userName']));
    $_pass = $db->real_escape_string($_POST['password']);
    $username = "";

    $ergebnis = $db->query("SELECT * FROM user WHERE UPPER(name) = '$_userName' AND passwort = '$_pass'");

    if (!$ergebnis) {
        $meldung = mysqli_error($db);
    } else if (mysqli_num_rows($ergebnis) == 1) {
        $row = $ergebnis->fetch_array();
        $username = $row[1];
        $meldung = "OK";
        session_start();
        $_SESSION['login'] = 1;
    } else {
        $meldung = "nOK";
    }

    echo json_encode(array("meldung" => $meldung, "Username" => $username));
    $db->close();
} else {
    header('Location: ../index.php');
    exit();
}
?>