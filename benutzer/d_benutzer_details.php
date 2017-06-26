<div class="modal fade" id="benutzer_bearbeiten" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Benutzer bearbeiten</h4>
            </div>
            <div class="modal-body">               
                <div class="tab-content">                    
                        <label for="bname">Benutzername</label>
                        <input type="text" class="form-control" id="bname" placeholder="Benutzername"></br>

                        <label for="passwort">Passwort</label>
                        <input type="password" class="form-control" id="passwort" placeholder="Passwort"></br>

                        <label for="passwortwh">Passwort wiederholen</label>
                        <input type="password" class="form-control" id="passwortwh" placeholder="Passwort wiederholen"></br>

                        <label for="email">E-Mail</label>
                        <input type="text" class="form-control" id="email" placeholder="E-Mail"></br>

                        <label for="vorname">Vorname</label>
                        <input type="text" class="form-control" id="vorname" placeholder="Vorname"></br>

                        <label for="nachname">Nachname</label>
                        <input type="text" class="form-control" id="nachname" placeholder="Nachname"></br>                                            

                    <div class="alert alert-danger MarTop10" role="alert" style="display: none;" id="UserEdit_error"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Abbrechen</button>
                <button type="button" class="btn btn-success" id="bearbeiten">Speichern</button>
            </div>
        </div>
    </div>
</div>