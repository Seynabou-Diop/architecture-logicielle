<?php
require_once 'Database.php';

class CategoryDAO {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllCategories() {
        $query = "SELECT * FROM categorie";
        return $this->db->executeQuery($query);
    }

    public function getCategoryById($id) {
        $query = "SELECT * FROM categorie WHERE id = :id";
        $params = [':id' => $id];
        return $this->db->executeQuery($query, $params);
    }

    public function createCategorie($libelle) {
        $query = "INSERT INTO Categorie (libelle) VALUES (:libelle)";
        $params = [':libelle' => $libelle];
        return $this->db->executeNonQuery($query, $params);
    }

    public function updateCategorie($id, $libelle) {
        $query = "UPDATE Categorie SET libelle = :libelle WHERE id = :id";
        $params = [':id' => $id, ':libelle' => $libelle];
        return $this->db->executeNonQuery($query, $params);
    }

    public function deleteCategorie($id) {
        $query = "DELETE FROM Categorie WHERE id = :id";
        $params = [':id' => $id];
        return $this->db->executeNonQuery($query, $params);
    }

}
?>