<?php
    require_once 'Database.php';

    class TokenDAO {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getAllTokens() {
            $query = "SELECT * FROM token";
            return $this->db->executeQuery($query);
        }

        public function getTokenByUser($user_id) {
            $query = "SELECT valeur FROM token WHERE user = :user_id";
            $params = [':email' => $email];
            return $this->db->executeQuery($query, $params);
        }

        
        public function addToken($userId, $token) {
            $query = "INSERT INTO token (user, valeur) VALUES (:userId, :token)";
            $params = [':userId' => $userId, ':token' => $token];
            return $this->db->executeNonQuery($query, $params);
        }
    
        public function deleteToken($userId) {
            $query = "DELETE FROM token WHERE user = :userId";
            $params = [':userId' => $userId];
            return $this->db->executeNonQuery($query, $params);
        }

        public function validateToken($token) {
            $query = "SELECT user FROM token WHERE valeur = :token";
            $params = [':token' => $token];
            $result = $this->db->executeQuery($query, $params);
            return !empty($result);
        }
        
    }

?>