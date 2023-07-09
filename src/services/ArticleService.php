<?php
require_once 'C:\xampp\htdocs\mglsi\archi\src\models\Article.php';


class ArticleService {
    private $article;

    public function __construct() {
        $this->article = new Article();
    }

    public function getAllArticles() {
        return $this->article->getAllArticles();
    }

    public function getArticleById($id) {
        return $this->article->getArticleById($id);
    }

    public function getArticlesByCategory($id) {
        return $this->article->getArticlesByCategory($id);
    }

    public function createArticle($articleData) {
        return $this->article->createArticle($articleData);
    }

    public function updateArticle($id, $articleData) {
        return $this->article->updateArticle($id, $articleData);
    }

    public function deleteArticle($id) {
        return $this->article->deleteArticle($id);
    }
}
?>