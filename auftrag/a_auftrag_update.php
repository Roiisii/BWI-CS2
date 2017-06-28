<?php

$data = "empty";

if (isset($_POST['datas'])) {
    include ("../config/db.php");
    include ("../utility/DB.class.php");

    $count = 0;
    $results = $_POST['datas'];
    
    foreach ($results as $result) {
        //$data = var_dump($result);
        $pid = $result['id'];
        $kid = $result['kid'];
        $status = $result['status'];

        $data = DB::updateProduktStatus($status, $pid, $kid);
        
        if ($status  == 1) {
            $count++;
        }
    }
    
    $products = count($results);
    
    if ($products == $count) {
        $send = DB::setVersendet($kid);
    } else {
         $send = DB::resetVersendet($kid); 
    }
    
}
echo $data;
?>
