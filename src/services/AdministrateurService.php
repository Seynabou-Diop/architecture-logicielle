<?php
require_once 'C:\xampp\htdocs\mglsi\archi\src\models\Administrateur.php';

class AdministrateurService {
    private $administrateur;
    private $userDAO;
    public function __construct() {
        $this->administrateur = new Administrateur();
        $this->userDAO = new UserDAO();
    }

    public function getAllAdministrateurs() {
        return $this->administrateur->getAllAdministrateurs();
    }

    public function getAdministrateurByEmail($email) {
        return $this->administrateur->getAdministrateurByEmail($email);
    }

    public function getPassword($email) {
        return $this->administrateur->getPasswordByEmail($email);
    }

    public function checkAdministrateur($email, $motDePasse) {
        $administrateur = $this->administrateur->getAdminByPasswordAndEmail($email, $motDePasse);
    
        if ($administrateur) {
            return true;
        }
    
        return false;
    }
    public function addUser($user) {
        $administrateur = $this->administrateur->addUser($user);

    }
    
    public function updateUser($id, $user) {
        $administrateur = $this->administrateur->updateUser($id, $user)

    }
        
        public function deleteUser($userId) {
            $administrateur = $this->administrateur->deleteUser($userId);

        }
        
        public function generateToken($userId) {
            $tokenService = new TokenService();
            $token = $tokenService->generateToken($userId);
            return $token;
        }
    public function addToken($userId) {
        $token = $this->generateToken();
        $this->tokenDAO->addToken($userId, $token);
        return $token;
    }
    
    public function deleteToken($userId) {
        $this->tokenDAO->deleteToken($userId);
    }
    
    public function authenticateUser($email, $password) {
        $user = $this->userDAO->getUserByPasswordAndEmail($email, $password);
        
        if ($user) {
            // Authentification réussie
            $userId = $user['id'];
            
            // Génération du jeton d'authentification
            $tokenService = new TokenService();
            $token = $tokenService->generateToken($userId);
            
            return $token;
        }
        
        // Authentification échouée
        return null;
    }
    
}

?>