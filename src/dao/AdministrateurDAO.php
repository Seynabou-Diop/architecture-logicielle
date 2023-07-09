<?php
require_once 'Database.php';
require_once 'TokenDAO.php';

class AdministrateurDAO {
    private $db;
    private $tokenDAO;

    public function __construct() {
        $this->db = new Database();
        $this->tokenDAO = new TokenDAO();
    }

    public function getAllAdministrateurs() {
        $query = "SELECT * FROM user";
        return $this->db->executeQuery($query);
    }

    public function getAdministrateurByEmail($email) {
        $query = "SELECT * FROM user WHERE email = :email";
        $params = [':email' => $email];
        return $this->db->executeQuery($query, $params);
    }

    public function getAdminByPasswordAndEmail($email, $motDePasse) {
        $query = "SELECT * FROM user WHERE email = :email AND motdePasse = SHA2(:motDePasse, 256)";
        $params = [':email' => $email, ':motDePasse' => $motDePasse];
        return $this->db->executeQuery($query, $params);
    }

    public function addUser($user) {
        $query = "INSERT INTO User (email, motDePasse, isAdmin) VALUES (:email, :motDePasse, :isAdmin)";
        $params = [
            ':email' => $user['email'],
            ':motDePasse' => $user['motDePasse'],
            ':isAdmin' => $user['isAdmin']
        ];
        return $this->db->executeNonQuery($query, $params);
    }
    
    public function updateUser($id, $user) {
        $query = "UPDATE User SET email = :email, motDePasse = :motDePasse, isAdmin = :isAdmin WHERE id = :id";
        $params = [
            ':id' => $id,
            ':email' => $user['email'],
            ':motDePasse' => $user['motDePasse'],
            ':isAdmin' => $user['categorie']
        ];
        return $this->db->executeNonQuery($query, $params);    }
    
    public function deleteUser($userId) {
        $query = "DELETE FROM User WHERE id = :id";
        $params = [':id' => $id];
        return $this->db->executeNonQuery($query, $params);
    }
    
    
    
    private function generateToken() {
        // Code pour générer un nouveau jeton d'authentification
    }
}



?>
