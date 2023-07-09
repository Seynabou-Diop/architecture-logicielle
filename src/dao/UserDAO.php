<?php
class UserDAO {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM user WHERE email = :email";
        $params = [':email' => $email];
        return $this->db->executeQuery($query, $params);
    }

    public function getUserByPasswordAndEmail($email, $password) {
        $query = "SELECT * FROM user WHERE email = :email AND password = :password";
        $params = [':email' => $email, ':password' => $password];
        return $this->db->executeQuery($query, $params);
    }

    public function getAllUsers() {
        $query = "SELECT * FROM user";
        return $this->db->executeQuery($query);
    }

}
?>