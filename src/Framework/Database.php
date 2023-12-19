<?php

declare(strict_types= 1);

namespace Framework;

use PDO, PDOException, PDOStatement;

class Database {

    private PDO $connection;
    private PDOStatement $statement;
    public function __construct(string $driver, array $config, $username, $password){
        $config = http_build_query(data: $config, arg_separator: ';');
        $dsn = "{$driver}:{$config}";
        try {
            $this-> connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die('Unable to connect to the database.');
        }
    }

    public function query(string $query, array $params=[]){
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
    }
}