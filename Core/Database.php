<?php

namespace Core;
use PDO;

class Database
{

    private $db;

    public function __construct($config)
    {

        $connectionString = $config['drive'] . ':' . $config['database'];

        $this->db = new pdo($connectionString);
    }


    public function query($query, $class = null, $params = []) {

        $prepare = $this->db->prepare($query);

        if ($class){
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);

        return $prepare;
        
    }

}

