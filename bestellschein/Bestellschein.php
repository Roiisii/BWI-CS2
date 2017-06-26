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
        <style>  </style>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container">
        <h2 class="heading"> Bestellscheine </h2>
        
        
        <table class="table table-striped">
            <tr>
                <th> Status </th> <!-- Wo ist das Lieferdatum in der DB ? -->
                <th> Bestellschein </th>
                <th> Lieferant </th>
                <th> Bestelldatum </th>
                <th> Detail </th>
                
            </tr>
            
            <!-- Testanzeigewerte 
            <tr>
                <td class="test1"> <?php //echo html_entity_decode("&#9899") ?> </td>
                <td> Test 2 </td>
                <td> Test 3 </td>
                <td> Test 4 </td>
                <td> <button type='button' class='btn btn-primary btn-sm' onClick='detail()' data-toggle='modal' data-target='#detailModal'> Detail </button> </td>
            </tr>-->
        

        <?php
        // korrekten Werte
        
        $abfrage = "SELECT lbid, datum_erstellung, name FROM lieferantenbestellung" 
                 . " JOIN lieferant on lieferantenbestellung.lid = lieferant.lid";
        $result = $db->query($abfrage);
        
        
          
            while ($zeile = $result->fetch_object()){
                echo "<tr>";
                echo "<td class='test1'> &#9899 </td>";
                echo "<td> $zeile->lbid </td>";
                echo "<td> $zeile->name </td>";
                echo "<td> $zeile->datum_erstellung </td>";
                echo "<td> <button type='button' class='btn btn-primary btn-sm' onClick='detail()' data-toggle='modal' data-target='#detailModal'> Detail </button> </td>";
                echo "</tr>";
            }
        
        ?>   
        
        </table>
        </div>
        <?php include('../libraries/jslibrary.php'); ?>
        <?php include('./BestellscheinDetails.php'); ?>
        <script src="./l_bestellschein.js"></script>
    </body>
</html>