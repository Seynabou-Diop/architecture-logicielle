<?php
class Database {
    private $host = "localhost";
    private $dbname = "mglsi_news2";
    private $username = "mglsi_user";
    private $password = "passer";
    private $connection;

    public function __construct() {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, $params = []) {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function executeNonQuery($query, $params = []) {
        $stmt = $this->connection->prepare($query);
        return $stmt->execute($params);
    }
    

    }

?>
