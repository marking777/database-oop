<?php
include_once('../db/db.php');
class product {
    private $dbh;


    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addproduct($naam, $prijs, $beschrijving) {
        $sql = "INSERT INTO producten (naam, prijs, beschrijving) VALUES (?, ?, ?)";
        $this->dbh->run($sql, array($naam, $prijs, $beschrijving));
    }
    public function getAllproducten() {
        $sql = "SELECT * FROM producten";
        $stmt = $this->dbh->run($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
