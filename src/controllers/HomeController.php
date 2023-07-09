<?php
require_once 'C:\xampp\htdocs\mglsi\archi\src\services\ArticleService.php';
require_once 'C:\xampp\htdocs\mglsi\archi\src\services\CategoryService.php';

class HomeController {
    private $articleService;
    private $categoryService;

    public function __construct() {
        $this->articleService = new ArticleService();
        $this->categoryService = new CategoryService();
    }

    public function showHomePage() {
        session_start();
        $isAdminLoggedIn = false;

        if (isset($_SESSION['admin_authenticated']) && $_SESSION['admin_authenticated'] === true) {
            $isAdminLoggedIn = true;
        }

        $data = new stdClass(); 

        $data->categories = $this->categoryService->getAllCategories();

        if (isset($_GET['action']) && $_GET['action'] === 'categorie' && isset($_GET['id'])) {
            $catId = $_GET['id'];
            $data->articles = $this->articleService->getArticlesByCategory($catId);
        } else if (isset($_GET['action']) && $_GET['action'] === 'article' && isset($_GET['id'])) {
            $articleId = $_GET['id'];
            $data->articles = $this->articleService->getArticleById($articleId);
        } else {
            $data->articles = $this->articleService->getAllArticles();
        }   

        if (isset($_GET['success'])) {
            $successMessage = $_GET['success'];
            echo '<div class="success-message" style="background-color: green; font-size: 20px; color: white; padding: 10px; position: fixed; top: 75px; right: 10px; opacity: 1; transition: opacity 0.5s;">' . $successMessage . '</div>';
            echo '<script>setTimeout(function() { document.querySelector(".success-message").style.opacity = 0; }, 3000);</script>';
        }

        if (isset($_GET['echec'])) {
            $echecMessage = $_GET['echec'];
            echo '<div class="echec-message">' . $echecMessage . '</div>';            
        }

        require 'C:\xampp\htdocs\mglsi\archi\src\views\accueil.php';
    }
}
?>
