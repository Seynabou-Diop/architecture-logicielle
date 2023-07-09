<?php


    require_once 'C:\xampp\htdocs\mglsi\archi\src\services\ArticleService.php';

    class ArticleController {

        public function createArticle() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $articleService = new ArticleService();

                $titre = $_POST['titre'];
                $contenu = $_POST['contenu'];
                $categorie = $_POST['categorie'];

                $articleData = array(
                    'titre' => $titre,
                    'contenu' => $contenu,
                    'categorie' => $categorie
                );

                if ($articleService->createArticle($articleData)) {
                    $message = "L'article a été créé avec succès!";
                    header('Location: ../controllers/dashboardAdminController.php?success=' . urlencode($message));
                    exit();
                } else {
                    $message = "Échec de la création de l'article.";
                    header('Location: ../controllers/dashboardAdminController.php?echec=' . urlencode($message));
                    exit();
                }
            }
        

                require '..\views\createArticle.php';
        }

        public function updateArticle() {
            $articleService = new ArticleService();
            $id = $_GET['id'];
            $articles = $articleService->getArticleById($id);

            if (!empty($articles)) {
                $article = $articles[0]; // Récupérer le premier objet du tableau

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $titre = $_POST['titre'];
                    $contenu = $_POST['contenu'];
                    $categorie = $_POST['categorie'];

                    $articleData = array(
                        'id' => $id,
                        'titre' => $titre,
                        'contenu' => $contenu,
                        'categorie' => $categorie
                    );

                    if ($articleService->updateArticle($id, $articleData)) {
                        $message = "L'article a été mis à jour avec succès.";
                        header('Location: ../controllers/dashboardAdminController.php?success=' . urlencode($message));
                        exit();
                    } else {
                        $message = "Échec de la mise à jour de l'article.";
                        header('Location: ../controllers/dashboardAdminController.php?echec=' . urlencode($message));
                        exit();
                    }
                }

                require '..\views\updateArticle.php';
            } else {
                $errorMessage = "L'article demandé n'existe pas.";
            }
        }


        public function deleteArticle() {
            $articleService = new ArticleService();
            $id = $_GET['id'];
            $articles = $articleService->getArticleById($id);

            if (!empty($articles)) {
                $article = $articles[0]; 

                    if ($articleService->deleteArticle($id)) {
                        $message = "L'article a été supprimé avec succès.";
                        header('Location: ../controllers/dashboardAdminController.php?success=' . urlencode($message));
                        exit();
                    } else {
                        $message = "Échec de la suppression de l'article.";
                        header('Location: ../controllers/dashboardAdminController.php?echec=' . urlencode($message));
                        exit();
                    }

            } else {
                $errorMessage = "L'article demandé n'existe pas.";
            }
        }


    }

    $controller = new ArticleController();
    
        if (isset($_POST['action'])) {
            $action = $_POST['action'];

            if ($action === 'create') {
            
                $controller->createArticle();
            } elseif ($action === 'update') {
                $id = $_POST['id'];
                $controller->updateArticle($id);
            } elseif ($action === 'delete') {
                $id = $_POST['id'];
                $controller->deleteArticle($id);
            }
        }
     else {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            if ($action === 'create') {
                $controller->createArticle();
            }
            elseif ($action === 'update') {
                $id = $_GET['id'];
                $controller->updateArticle($id);
            } elseif ($action === 'delete') {
                $id = $_GET['id'];
                $controller->deleteArticle($id);
            }
        }
    }

?>