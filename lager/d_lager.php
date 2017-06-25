<link href="../css/regale.css" rel="stylesheet">
<div class="lager_container">
    <div class="row lager_reihe lager_quer_linie">
        <div class="col-md-4 lager_fach">
            <button type="button" class="lager_fach_button" id="A1" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
        <div class="col-md-4 lager_fach_mitte">
            <button type="button" class="lager_fach_button" id="A2" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
        <div class="col-md-4 lager_fach">
            <button type="button" class="lager_fach_button" id="A3" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <div class="row lager_reihe lager_quer_linie">
        <div class="col-md-4 lager_fach">
            <button type="button" class="lager_fach_button" id="B1" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
        <div class="col-md-4 lager_fach_mitte">
            <button type="button" class="lager_fach_button" id="B2" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
        <div class="col-md-4 lager_fach">
            <button type="button" class="lager_fach_button" id="B3" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <div class="row lager_reihe">
        <div class="col-md-4 lager_fach">
            <button type="button" class="lager_fach_button" id="C1" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
        <div class="col-md-4 lager_fach_mitte">
            <button type="button" class="lager_fach_button" id="C2" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
        <div class="col-md-4 lager_fach">
            <button type="button" class="lager_fach_button" id="C3" data-toggle="modal" data-target="#Artikel">
                <span class="glyphicon glyphicon-plus lager_glyph" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</div>  
<div>
    <div class="row">
        <div class="col-md-8">
            <h2><button type="button" class="lager_change_button" id="regalChangeLeft">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            </button>
            <button type="button" class="lager_change_button" id="regalChangeRight">
                <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
            </button></h2>
        </div>
        <div class="col-md-4">
            <h2 id="reagalCounter">01/09<h2>
        </div>
    </div>
</div>

<script src="../lager/l_lager.js"></script>



<!-- Modal -->
<div class="modal fade" id="Artikel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>