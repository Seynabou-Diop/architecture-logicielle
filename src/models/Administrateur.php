<?php
require_once 'C:\xampp\htdocs\mglsi\archi\src\dao\AdministrateurDAO.php';

class Administrateur {
    private $administrateurDao;

    public function __construct() {
        $this->administrateurDao = new AdministrateurDAO();
    }

    public function getAllAdministrateurs() {
        return $this->administrateurDao->getAllAdministrateurs();
    }

    public function getAdministrateurByEmail($email) {
        return $this->administrateurDao->getAdministrateurByEmail($email);
    }

    public function getAdminByPasswordAndEmail($email, $password) {
        return $this->administrateurDao->getAdminByPasswordAndEmail($email, $password);
    }

    public function addUser($user) {
        return $this->administrateurDao->addUser($user);

    }
    
    public function updateUser($id, $user) {
        return $this->administrateurDao->updateUser($id, $user);

          }
}
    public function deleteUser($userId) {
        return $this->administrateurDao->deleteUser($userId);

    }
    
?>