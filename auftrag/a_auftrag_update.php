<?php

$data = "empty";

if (isset($_POST['datas'])) {
    include ("../config/db.php");
    include ("../utility/DB.class.php");

    $results = $_POST['datas'];
    
    foreach ($results as $result) {
        //$data = var_dump($result);
        $pid = $result['id'];
        $kid = $result['kid'];
        $status = $result['status'];
        $data = DB::updateProduktStatus($status, $pid, $kid);
    }      
}
echo $data
?>
