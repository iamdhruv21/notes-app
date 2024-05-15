<?php

namespace Core;
use PDO;
use PDOException;

class Database{
    public $connection;

    public $statement;

    public function __construct($config, $username = 'root', $password = '@21Nov2004')
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ] );
        } catch (PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage();
        }

    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $result = $this->find();

        if (! $result){
            abort();
        }

        return $result;
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }
}

//foreach($notes as $note){
//    echo "<li>{$note['note']}</li>";
//}