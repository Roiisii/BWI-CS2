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
          
        <p id="value1"> Bestellscheinnummer </p> <!-- lbid? -->
        <p id="value2"> Erstellungsdatum </p>
        <p id="value3"> Bestätigungsdatum </p>
        <p id="value4"> Zahlungsdatum </p>
        <p id="value5"> Dummy </p>
        
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        <button type="button" class="btn btn-primary" data-dismiss="modal"> Close </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->