<div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h3>Benutzerübersicht</h3>
            <button type="button" style="float: right;" class="btn btn-info btn-lg " id="userAdd" data-toggle="modal" data-target="#benutzer_bearbeiten">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <table class="table table-striped" id="UserTable">
                <tr><th>ID</th><th>Vorname</th><th>Nachname</th><th>Username</th></tr>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php include("../benutzer/d_benutzer_details.php"); ?>

<script src="../benutzer/l_benutzer_view.js"></script>