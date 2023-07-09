<?php
require_once 'TokenDAO.php';

class TokenService {
    private $tokenDAO;

    public function __construct() {
        $this->tokenDAO = new TokenDAO();
    }

    public function generateToken($userId) {
        $token = bin2hex(random_bytes(32));
        $this->tokenDAO->addToken($userId, $token);
        return $token;
    }

    public function revokeToken($userId) {
        $this->tokenDAO->deleteToken($userId);
    }

    public function validateToken($token) {
        $this->tokenDAO->validateToken($token);
    }
}
?>
