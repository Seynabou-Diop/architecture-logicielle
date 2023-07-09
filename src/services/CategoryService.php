<?php
require_once 'C:\xampp\htdocs\mglsi\archi\src\models\Category.php';

class CategoryService {
    private $category;

    public function __construct() {
        $this->category = new Category();
    }

    public function getAllCategories() {
        return $this->category->getAllCategories();
    }

    public function getCategoryById($id) {
        return $this->category->getCategoryById($id);
    }

    public function createCategorie($libelle) {
        return $this->category->createCategorie($libelle);
        
    }

    public function updateCategorie($id, $libelle) {
        return $this->category->updateCategorie($id, $libelle);

    }

    public function deleteCategorie($id) {
        return $this->category->deleteCategorie($id);

    }
}
?>