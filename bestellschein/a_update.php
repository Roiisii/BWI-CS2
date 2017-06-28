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
        $lid = $result['lid'];
        $status = $result['status'];

        $data = DB::updateBestellung($status, $pid, $lid);
        
        if ($status  == 1) {
            $count++;
        }
    } 
    
    $products = count($results);
    
    if ($products == $count) {
        $send = DB::setOrder($lid);
    } else {
         $send = DB::resetOrder($lid); 
    }
}
echo $send
?>
