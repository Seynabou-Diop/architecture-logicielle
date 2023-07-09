<?php
require_once 'C:\xampp\htdocs\mglsi\archi\src\dao\CategoryDAO.php';

class Category {
    private $categoryDao;

    public function __construct() {
        $this->categoryDao = new CategoryDAO();
    }

    public function getAllCategories() {
        return $this->categoryDao->getAllCategories();
    }

    public function getCategoryById($id) {
        return $this->categoryDao->getCategoryById($id);
    }

    public function createCategorie($libelle) {
        return $this->categoryDao->createCategorie($libelle);
        
    }

    public function updateCategorie($id, $libelle) {
        return $this->categoryDao->updateCategorie($id, $libelle);

    }

    public function deleteCategorie($id) {
        return $this->categoryDao->deleteCategorie($id);

    }

}
?>

