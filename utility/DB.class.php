<?php

class DB {

    public static function getAuftraege() {
        $data = array();
        $db = new database();
        $db->connect();
        if ($db) {
            $stmt = $db->prepare('select if(versendet is null,0,1) as status, kbid, an_lager_gesendet_am, versendet'
                    . ' from kundenbestellung where an_lager_gesendet_am is not null');

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
            $db->close();
            return $data;
        }
        $db->close();
    }

    public static function getAuftraegeProduct($kbid) {
        $data = array();
        $db = new database();
        $db->connect();
        if ($db) {
            $stmt = $db->prepare('select k.pid, p.titel, k.anzahl, IFNULL(k.status,0) as status from produkt_kundenbestellung k'
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
            $db->close();
            return $data;
        }
        $db->close();
    }

    public static function setVersendet($kbid) {
        $db = new database();
        $db->connect();
        if ($db) {

            $stmt = $db->prepare("update kundenbestellung set versendet = sysdate() where kbid = ?");

            $stmt->bind_param('i', $kbid);
            $stmt->execute();
            if ($stmt) {
                $db->close();
                return "ok";
            } else {
                $db->close();
                return "nok";
            }
            $stmt->close();
        }
        $db->close();
    }
    
        public static function resetVersendet($kbid) {
        $db = new database();
        $db->connect();
        if ($db) {

            $stmt = $db->prepare("update kundenbestellung set versendet = null where kbid = ?");

            $stmt->bind_param('i', $kbid);
            $stmt->execute();
            if ($stmt) {
                $db->close();
                return "ok";
            } else {
                $db->close();
                return "nok";
            }
            $stmt->close();
        }
        $db->close();
    }

    public static function updateProduktStatus($status, $pid, $kbid) {
        $db = new database();
        $db->connect();
        if ($db) {

            $stmt = $db->prepare("update produkt_kundenbestellung set status = ? where pid = ? and kbid = ?");

            $stmt->bind_param('iii', $status, $pid, $kbid);
            $stmt->execute();
            if ($stmt) {
                $db->close();
                return "ok";
            } else {
                $db->close();
                return "nok";
            }
            $stmt->close();
        }
        $db->close();
    }

    public static function getBestellungen() {
        $data = array();
        $db = new database();
        $db->connect();
        if ($db) {

            $stmt = $db->prepare("SELECT if(bestaetigt_datum is null,0,1) as status, lbid, datum_erstellung, name, bestaetigt_datum FROM lieferantenbestellung "
                    . " JOIN lieferant on lieferantenbestellung.lid = lieferant.lid");

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
            $db->close();
            return $data;
        }
        $db->close();
    }

    public static function getBestellungDetail($lbid) {
        $data = array();
        $db = new database();
        $db->connect();
        if ($db) {
            $stmt = $db->prepare('select p.titel, lb.anzahl, lb.status, lb.pid from produkt_lieferantenbestellung lb '
                    . ' inner join produkt p on p.pid = lb.pid '
                    . ' inner join lieferantenbestellung l on lb.lbid = l.lbid '
                    . ' where lb.lbid = ? ');

            $stmt->bind_param('i', $lbid);
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
            $db->close();
            return $data;
        }
        $db->close();
    }

    public static function updateBestellung($status, $lbid, $kbid) {
        $db = new database();
        $db->connect();
        if ($db) {

            echo $status;
            $stmt = $db->prepare("update produkt_lieferantenbestellung set status = ? where pid = ? and lbid = ?");

            $stmt->bind_param('iii', $status, $lbid, $kbid);
            $stmt->execute();
            if ($stmt) {
                $db->close();
                return "ok";
            } else {
                $db->close();
                return "nok";
            }
            $stmt->close();
        }
        $db->close();
    }

    public static function updateBestellungDatum($lbid) {
        $db = new database();
        $db->connect();
        if ($db) {

            echo $status;
            $stmt = $db->prepare("update lieferantenbestellung set bestaetigt_datum = sysdate where lbid = ?");

            $stmt->bind_param('i', $lbid);
            $stmt->execute();
            if ($stmt) {
                $db->close();
                return "ok";
            } else {
                $db->close();
                return "nok";
            }
            $stmt->close();
        }
        $db->close();
    }

   public static function setOrder($lbid) {
        $db = new database();
        $db->connect();
        if ($db) {

            $stmt = $db->prepare("update lieferantenbestellung set bestaetigt_datum = sysdate() where lbid = ?");

            $stmt->bind_param('i', $lbid);
            $stmt->execute();
            if ($stmt) {
                $db->close();
                return "ok";
            } else {
                $db->close();
                return "nok";
            }
            $stmt->close();
        }
        $db->close();
    }
    
        public static function resetOrder($lbid) {
        $db = new database();
        $db->connect();
        if ($db) {

            $stmt = $db->prepare("update lieferantenbestellung set bestaetigt_datum = null where lbid = ?");

            $stmt->bind_param('i', $lbid);
            $stmt->execute();
            if ($stmt) {
                $db->close();
                return "ok";
            } else {
                $db->close();
                return "nok";
            }
            $stmt->close();
        }
        $db->close();
    }

    public static function getArtikel() {
        $data = array();
        $db = new database();
        $db->connect();
        if ($db) {

            $stmt = $db->prepare('SELECT pid, p.titel, k.titel as kategorie, lagerstand, lieferbar from produkt p inner join kategorie k on p.kid = k.kid');

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
            $db->close();
            return $data;
        }
        $db->close();
    }

    public static function getArtikelDetail($pid) {
        $data = array();
        $db = new database();
        $db->connect();
        if ($db) {
            $stmt = $db->prepare('SELECT p.pid, p.titel, lagerstand, preis, lagerplatznummer, beschreibung, l.name '
                    . ' from produkt p '
                    . ' left outer join lieferant_produkt lp on p.pid = lp.pid'
                    . ' left outer join lieferant l on lp.lid = l.lid'
                    . ' where p.pid = ?');

            $stmt->bind_param('i', $pid);
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
            $db->close();
            return $data;
        }
        $db->close();
    }

}
