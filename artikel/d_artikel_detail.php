<?php
$results = DB::getArtikelDetail($_GET['pid']);
?>

<?php foreach ($results as $result) : ?>
    <div class="col-md-8">
        <h2 class="heading"><?php echo $result->titel ?></h2>
        <a href ="hauptmenue.php?section=article" class="btn btn-primary">zurück</a>
        <br>
        <br>
        <div class=" col-md-9 col-lg-9 ">
            <table class="table table-user-information">
                <tbody>

                    <tr>
                        <td>Produktid</td>
                        <td><?php echo $result->pid ?></td>
                    </tr>               
                    <tr>
                        <td>Preis</td>
                        <td><?php echo $result->preis ?></td>
                    </tr>
                    <tr>
                        <td>Lieferant</td>
                        <td><?php echo $result->name ?></td>
                    </tr>
                    <tr>
                        <td>Lagerbestand</td>
                        <td><?php echo $result->lagerstand ?></td>
                    </tr>
                    <tr>
                        <td>Lagerplatznummer</td>
                        <td><?php echo $result->lagerplatznummer ?></a></td>
                    </tr>
                    <tr>
                        <td>Beschreibung</td>
                        <td><?php echo $result->beschreibung ?></td>
                    </tr>   

                </tbody>
            </table>
        </div>
    <?php endforeach ?>        
</div>
