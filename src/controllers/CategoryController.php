<?php
require_once 'C:\xampp\htdocs\mglsi\archi\src\services\CategoryService.php';

class CategoryController {
    public function createCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryService = new CategoryService();

            $libelle = $_POST['libelle'];

            $success = $categoryService->createCategorie($libelle);

            if ($success) {
                $message = "La catégorie a été créée avec succès !";
                header('Location: ../controllers/dashboardAdminController.php?success=' . urlencode($message));
                exit();
            } else {
                $message = "Échec de la création de la catégorie !";
                header('Location: ../controllers/dashboardAdminController.php?error=' . urlencode($message));
                exit();
            }
        }

        require '..\views\createCategory.php';
    }

    public function updateCategory() {
        $categoryService = new CategoryService();
            $id = $_GET['id'];
            $categories = $categoryService->getcategoryById($id);

            if (!empty($categories)) {
                $category = $categories[0];

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $libelle = $_POST['libelle'];

                $success = $categoryService->updateCategorie($id, $libelle);

                if ($success) {
                    $message = "La catégorie a été mise à jour avec succès.";
                    header('Location: ../controllers/dashboardAdminController.php?success=' . urlencode($message));
                    exit();
                } else {
                    $message = "Échec de la mise à jour de la catégorie.";
                    header('Location: ../controllers/dashboardAdminController.php?error=' . urlencode($message));
                    exit();
                }
            }

        require '..\views\updateCategory.php';
    }

    }

    public function deleteCategory() {
        $categoryService = new CategoryService();

        $id = $_GET['id'];

        $success = $categoryService->deleteCategorie($id);

        if ($success) {
            $message = "La catégorie a été supprimée avec succès!";
            header('Location: ../controllers/dashboardAdminController.php?success=' . urlencode($message));
            exit();
        } else {
            $message = "Échec de la suppression de la catégorie.";
            header('Location: ../controllers/dashboardAdminController.php?error=' . urlencode($message));
            exit();
        }
    }
}

$controller = new CategoryController();

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create') {
        $controller->createCategory();
    } elseif ($action === 'update') {
        $controller->updateCategory();
    } elseif ($action === 'delete') {
        $controller->deleteCategory();
    }
}

else {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        if ($action === 'create') {
            $controller->createCategory();
        }
        elseif ($action === 'update') {
            $id = $_GET['id'];
            $controller->updateCategory($id);
        } elseif ($action === 'delete') {
            $id = $_GET['id'];
            $controller->deleteCategory($id);
        }
    }
}

?>
