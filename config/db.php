<?php

class database {

    private $db;

    public function connect() {
        $this->db = new mysqli('wi-projectdb.technikum-wien.at', 's17-bbb2-fst-33', 'DbPass4b233', 's17-bbb2-fst-30', '3306');
        return $this->db;
    }    
    
    public function prepare($query) {
        return $this->db->prepare($query);
    }    
        
    public function close() {
        $this->db->close();
    }
}
?>

