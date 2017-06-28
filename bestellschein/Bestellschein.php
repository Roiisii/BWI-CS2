<h2 class="heading">Bestellscheine</h2>
<table class="table table-striped">
    <tr>
        <th>Status</th> 
        <th>Bestellschein</th>
        <th>Lieferant</th>
        <th>Bestelldatum</th>
        <th>Bestätigt am</th>
        <th>Detail</th>
    </tr>        

    <?php
    $results = DB::getBestellungen();
      
    foreach ($results as $result) {
        echo "<tr>";
        if ($result->status == 1) {
            echo "<td><span class='glyphicon glyphicon-ok'></span></td>";
        }else {
            echo "<td><span class='glyphicon glyphicon-remove'></span></td>";
        }
        echo "<td> $result->lbid </td>";
        echo "<td> $result->name </td>";
        echo "<td> $result->datum_erstellung </td>";
        echo "<td> $result->bestaetigt_datum </td>";
        echo "<td><a data-id='$result->lbid' class='btn btn-primary announce' data-toggle='modal' data-target='#detailModal'>details</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<?php include('../bestellschein/BestellscheinDetails.php'); ?>
<script src="../bestellschein/l_bestellschein.js"></script>
