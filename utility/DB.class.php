<?php

class DB {
    
    public static function getAuftraege() {
        $data = array();
        $db = new database();
        $db->connect();
        if ($db) {
            $stmt = $db->prepare('select * from kundenbestellung ');
                       
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result) {
                while ($entry = $result->fetch_object()) {
                    $data[] = $entry;
                }
            } else {
                //$_SESSION['danger'] = "Error at login";
            }
            $result->close();
            $stmt->close();
            return $data;

        }
        $db->close();
    }
    
     public static function getAuftraegeProduct($kbid) {
        $data = array();
        $db = new database();
        $db->connect();
        if ($db) {
            $stmt = $db->prepare('select k.pid, p.titel, k.anzahl, k.status from produkt_kundenbestellung k'
                    . ' inner join produkt p on k.pid = p.pid'
                    . ' where kbid = ?');
            $stmt->bind_param('i', $kbid);           
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result) {
                while ($entry = $result->fetch_object()) {
                    $data[] = $entry;
                }
            } else {
                //$_SESSION['danger'] = "Error at login";
            }
            $result->close();
            $stmt->close();
            return $data;

        }
        $db->close();
    }
    
    public static function updateProduktStatus($status, $pid, $kbid) {
        $db = new database();
        $db->connect();
        if ($db) {
            
            $stat=0;
            
            if ($status) {
                $stat = 1;
            }
            
            $stmt = $db->prepare("update produkt_kundenbestellung set status = ? where pid = ? and kbid = ?");
          
            $stmt->bind_param('iii', $stat, $pid, $kbid);
            $stmt->execute();
            if ($stmt) {
                return "ok";
            } else {
                return "nok";
            }
            $stmt->close();
        }
        $db->close();
    }
    
}
