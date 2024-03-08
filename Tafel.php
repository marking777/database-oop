<?php
include_once('../db/db.php');

class Tafel {
    private $dbh;

    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addTafel($tafelnummer, $stoelen, $grootte) {
        $sql = "INSERT INTO restaurant (tafelnummer, stoelen, grootte) VALUES (?, ?, ?)";
        $this->dbh->run($sql, array($tafelnummer, $stoelen, $grootte));
    }

    public function getAllTafels() {
        $sql = "SELECT * FROM restaurant";
        $stmt = $this->dbh->run($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
