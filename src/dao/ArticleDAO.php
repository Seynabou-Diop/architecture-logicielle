<?php
require_once 'Database.php';

class ArticleDAO {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllArticles() {
        $query = "SELECT * FROM article";
        return $this->db->executeQuery($query);
    }

    public function getArticleById($id) {
        $query = "SELECT * FROM article WHERE id = :id";
        $params = [':id' => $id];
        return $this->db->executeQuery($query, $params);
    }

    public function getArticlesByCategory($categoryId) {
        $query = "SELECT * FROM article WHERE categorie = :category_id";
        $params = [':category_id' => $categoryId];
        return $this->db->executeQuery($query, $params);
    }

    public function createArticle($articleData) {
        $query = "INSERT INTO Article (titre, contenu, categorie) VALUES (:titre, :contenu, :categorie)";
        $params = [
            ':titre' => $articleData['titre'],
            ':contenu' => $articleData['contenu'],
            ':categorie' => $articleData['categorie']
        ];
        return $this->db->executeNonQuery($query, $params);
    }
    

    public function updateArticle($id, $articleData) {
        $query = "UPDATE Article SET titre = :titre, contenu = :contenu, categorie = :categorie WHERE id = :id";
        $params = [
            ':id' => $id,
            ':titre' => $articleData['titre'],
            ':contenu' => $articleData['contenu'],
            ':categorie' => $articleData['categorie']
        ];
        return $this->db->executeNonQuery($query, $params);
    }

    public function deleteArticle($id) {
        $query = "DELETE FROM Article WHERE id = :id";
        $params = [':id' => $id];
        return $this->db->executeNonQuery($query, $params);
    }
}

?>
