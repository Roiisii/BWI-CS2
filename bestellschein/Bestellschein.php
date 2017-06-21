<!DOCTYPE html>

<?php
    require '../libraries/connection.php';
?>

<!-- DB connect
$host = "localhost";
$username = "root";
$password = "";
$dbName = "dbname";
----------------------
$conn = new mysqli($host, $username, $password, $dbname);
$abfrage = "SELECT * FROM ";
$result = $conn->query($abfrage);
----------------------
while ($zeile = $result->fetch_object()){
    echo $zeile->Spaltenname;
}
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Bestellscheine </title>
        <link rel="stylesheet" href="../css/custom.css">
        <?php include('../libraries/csslibrary.php'); ?>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container">
        <h2 class="heading"> Bestellscheine </h2>
        
        
        <table class="table table-striped">
            <tr>
                <th> Datum </th>
                <th> Bestellnummer </th>
                <th> Detail </th>
            </tr>
            
            <!-- Testanzeigewerte -->
            <tr>
                <td> Test 1 </td>
                <td> Test 2 </td>
                <td> <button type="button" class="btn btn-primary btn-sm" onClick="detail()" data-toggle="modal" data-target="#detailModal"> Detail </button> </td>
            </tr>
        
        <!-- korrekten Werte vorbereitet -->
        <!--
        <?php
        /*  
            while ($zeile = $result->fetch_object()){
                echo "<tr>";
                echo "<td> $zeile->wert1 </td>";
                echo "<td> $zeile->wert2 </td>";
                echo "<td> $zeile->wert3 </td>";
                echo "<td> $zeile->wert4 </td>";
                echo "</tr>";
            }*/
        
        ?>   
        -->
        </table>
        </div>
        <?php include('../libraries/jslibrary.php'); ?>
        <?php include('./BestellscheinDetails.php'); ?>
        <script src="./l_bestellschein.js"></script>
    </body>
</html>