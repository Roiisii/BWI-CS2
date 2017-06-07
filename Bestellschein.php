<!DOCTYPE html>

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
        <?php include('./libraries/csslibrary.php'); ?>
        <link rel="stylesheet" href="./css/custom.css">
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container">
        <h2 class="heading"> Bestellscheine </h2>
        
        
        <table class="table table-striped">
            <tr>
                <th> Wert 1 </th>
                <th> Wert 2 </th>
                <th> Wert 3 </th>
                <th> Wert 4 </th>
                <th> Detail </th>
            </tr>
            
            <!-- Testanzeigewerte -->
            <tr>
                <td> Test 4</td>
                <td> Test 2 </td>
                <td> Test 3 </td>
                <td> Test 4 </td>
                <td> <button type="button" class="btn btn-primary btn-sm" onclick="detail"> Detail </button> </td>
            </tr>
        
        <!-- korrekten Werte vorbereitet -->
        <!--
        <?php
        
            while ($zeile = $result->fetch_object()){
                echo "<tr>";
                echo "<td> $zeile->wert1 </td>";
                echo "<td> $zeile->wert2 </td>";
                echo "<td> $zeile->wert3 </td>";
                echo "<td> $zeile->wert4 </td>";
                echo "</tr>";
            }
        
        ?>   
        -->
        </table>
        </div>
    </body>
</html>
