<?php
include_once('../db/db.php');

class Reservering {
    private $dbh;
    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addReservering($begindatum, $einddatum, $klantid, $tafelid) {
        $sql = "INSERT INTO reservering (begindatum, einddatum, klantid, tafelid) VALUES (?, ?, ?, ?)";
        $this->dbh->run($sql, array($begindatum, $einddatum, $klantid, $tafelid));
    }

    public function getAllReserveringen() {
        $sql = "SELECT * FROM reservering";
        return $this->dbh->run($sql);
    }
}
?>
