<?php
include_once('../db/db.php');

class Rekening {
    private $dbh;

    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addRekening($reserveringid, $productid, $omschrijving) {
        $sql = "INSERT INTO rekeningen (reserveringid, productid, omschrijving) VALUES (?, ?, ?)";
        $this->dbh->run($sql, array($reserveringid, $productid, $omschrijving));
    }

    public function getAllRekeningen() {
        $sql = "SELECT * FROM rekeningen";
        return $this->dbh->run($sql);
    }
}

?>
