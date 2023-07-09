<?php
    require_once 'C:\xampp\htdocs\mglsi\archi\src\services\AdministrateurService.php';

    class AuthenticationController {

        public function showFormulaire() {

            $errorMessage = ''; 

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $adminService = new AdministrateurService();

                if ($adminService->checkAdministrateur($email, $password)) {
                    session_start();
                    $_SESSION['admin_authenticated'] = true;
                    header('Location: dashboardAdminController.php');
                    exit();
                } else {
                    $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
                }
            } else {
                $errorMessage = ''; 
            }

            require '../views/authentication.php';
        }

    }

    $controller = new AuthenticationController();
    $controller->showFormulaire();
?>
