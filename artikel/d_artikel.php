<h2 class="heading">Artikelverwaltung</h2>
<table class="table table-striped">
    <tr>
        <th>Produktid</th>
        <th>Titel</th> 
        <th>Kategorie</th>
        <th>Lagerbestand</th>
        <th>Lieferbar</th>
    </tr>        

    <?php
    $results = DB::getArtikel();

    foreach ($results as $result) {
        echo "<td>$result->pid </td>";
        echo "<td><a href='hauptmenue.php?section=articled&pid=$result->pid'>$result->titel </a></td>";
        echo "<td>$result->kategorie </td>";
        echo "<td>$result->lagerstand </td>";
        if ($result->lieferbar == 1) {
            echo "<td><span class='glyphicon glyphicon-ok'></span></td>";
        }else {
            echo "<td><span class='glyphicon glyphicon-remove'></span></td>";
        }
        echo "</tr>";
    }
    ?>
</table>
