<?php

class DataManager {

    private PDO $config;

    public function __construct() {
        $this->config = new PDO('mysql:dbname=s2project1; host=localhost', 'root', '');
    }

    public function exQuery(string $query) {
        $this->config->exec($query);
    }

    public function getData(string $query, bool $one) {
        $stmt = $this->config->prepare($query);
        $stmt->execute();
        if ($one)
            return $stmt->fetch();
        else
            return $stmt->fetchAll();
    }
}
?>
