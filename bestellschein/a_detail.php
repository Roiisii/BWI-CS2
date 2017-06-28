<?php

$data = "empty";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    include ("../config/db.php");
    include ("../utility/DB.class.php");

    $data = '<table class="table table-bordered table-striped">
        <tr>
            <th>Titel</th>
            <th>pid</th>
            <th>Anzahl</th>
            <th>Status</th>
        </tr>';

    $results = DB::getBestellungDetail($id);
    foreach ($results as $result) {
        $data .= '<tr>
            <td>' . $result->titel . '</td>
            <td>' . $result->pid . '</td>
            <td>' . $result->anzahl . '</td>';
            if ($result->status == 1) {
                $data .= '<td><input class="states" checked="true" type="checkbox" data-id='.$id.' value='. $result->pid . '></td>'; 
            } else {
                $data .= '<td><input class="states" type="checkbox" data-id='.$id.' value='. $result->pid . '></td>'; 
            }            
            $data .= '</tr>';
    }
    $data .= '</table>';
}
echo $data
?>
