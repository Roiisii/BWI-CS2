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
            
            <!-- Testanzeigewerte 
            <tr>
                <td> Test 1 </td>
                <td> Test 2 </td>
                <td> Test 3 </td>
                <td> <input type="checkbox" value="erhalten"> </td>
            </tr>
            -->
            
        <?php
        // korrekten Werte
        
            $abfrage = "SELECT titel, anzahl FROM produkt_lieferantenbestellung "
                    . "JOIN produkt on produkt_lieferantenbestellung.pid = produkt.pid "
                    . "JOIN lieferantenbestellung on produkt_lieferantenbestellung.lbid = lieferantenbestellung.lbid "
                    . "WHERE produkt_lieferantenbestellung.lbid = 1";
            $result = $db->query($abfrage);
        
            
            $test = 1;
            while ($zeile = $result->fetch_object()){
                echo "<tr>";
                echo "<td> $test </td>";
                echo "<td> $zeile->titel </td>";
                echo "<td> $zeile->anzahl </td>";
                echo "<td> <input type='checkbox' value='erhalten'> </td>";
                echo "</tr>";
                $test++;
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