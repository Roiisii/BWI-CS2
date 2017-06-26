<!-- Datenbank einbinden -->
<?php
   require '../libraries/connection.php';
?>


<div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> Details zu Bestellschein Nr # </h4>
      </div>
      <div class="modal-body">
          
        <p id="value1"> Lieferant: </p> <!-- lbid? -->
        <p id="value2"> Lieferdatum: </p>
        <p id="value3"> Bestellposten: </p>
        
        <table class="table table-striped">
            <tr>
                <th> Pos </th>
                <th> Bezeichnung </th>
                <th> Menge </th>
                <th> Erhalten </th>
                
            </tr>
            
            <!-- Testanzeigewerte -->
            <tr>
                <td> Test 1 </td>
                <td> Test 2 </td>
                <td> Test 3 </td>
                <td> <input type="checkbox" value="erhalten"> </td>
            </tr>
            
        <?php
        // korrekten Werte
            $abfrage = "SELECT lbid, datum_erstellung, name FROM lieferantenbestellung" 
            . " JOIN lieferant on lieferantenbestellung.lid = lieferant.lid"
            .  " ORDER BY lbid";
            $result = $db->query($abfrage);
        
        
          
            while ($zeile = $result->fetch_object()){
                echo "<tr>";
                echo "<td class='status'> &#9899 </td>";
                echo "<td> $zeile->lbid </td>";
                echo "<td> $zeile->name </td>";
                echo "<td> $zeile->datum_erstellung </td>";
                echo "<td> <button type='button' class='btn btn-primary btn-sm' onClick='detail()' data-toggle='modal' data-target='#detailModal'> Detail </button> </td>";
                echo "</tr>";
            }
        
        
        ?>

        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> </button>
        <button type="button" class="btn btn-primary" id="save" onClick="save()"> <span class="glyphicon glyphicon-ok"></span> </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->