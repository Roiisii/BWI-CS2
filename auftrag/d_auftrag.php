
<h2 class="heading">Auftragsliste</h2>
<table class="table table-striped">
    <tr>
        <th>Status</th>
        <th>Auftrag</th>
        <th>Artikel</th>
    </tr>        

    <?php
    $results = DB::getAuftraege();

    foreach ($results as $result) {
        echo "<tr>";
        echo "<td>$result->an_lager_gesendet_am</td>";
        echo "<td>$result->kbid</td>";        
        echo "<td><a data-id='$result->kbid' class='btn btn-primary announce' data-toggle='modal' data-target='#detailModal'>details</a></td>";
        echo "</tr>";
    }
    ?>


</table>
<script src="../auftrag/l_auftrag.js"></script>


<?php
    include("../auftrag/d_auftragdetail.php");
?>



