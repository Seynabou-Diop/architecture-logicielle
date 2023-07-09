<?php
require_once 'C:\xampp\htdocs\mglsi\archi\src\dao\ArticleDAO.php';

class Article {
    private $articleDao;

    public function __construct() {
        $this->articleDao = new ArticleDAO();
    }

    public function getAllArticles() {
        return $this->articleDao->getAllArticles();
    }

    public function getArticleById($id) {
        return $this->articleDao->getArticleById($id);
    }

    public function getArticlesByCategory($id) {
        return $this->articleDao->getArticlesByCategory($id);
    }

    public function createArticle($articleData) {
        return $this->articleDao->createArticle($articleData);
    }

    public function updateArticle($id, $articleData) {
        return $this->articleDao->updateArticle($id, $articleData);
    }

    public function deleteArticle($id) {
        return $this->articleDao->deleteArticle($id);
    }
    
}
?>

