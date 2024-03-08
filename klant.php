<?php
include_once('../db/db.php');
class Klant {
    private $dbh;


    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function addKlant($naam, $email, $telefoon) {
        $sql = "INSERT INTO klanten (naam, email, telefoon) VALUES (?, ?, ?)";
        $this->dbh->run($sql, array($naam, $email, $telefoon));
    }

    public function getAllklanten() {
        $sql = "SELECT * FROM klanten";
        $stmt = $this->dbh->run($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
