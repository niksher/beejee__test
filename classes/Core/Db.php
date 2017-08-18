<?php

namespace Core;

use PDO;
use PDOException;

class Db
{
    public function __construct()
    {
        try {
            $this->connect = new PDO(
                "mysql:host=localhost;dbname=" . MSQL_DB . ";charset=utf8"
                , MSQL_USER
                , MSQL_PASSWORD
            );
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Exception: ". $e->getMessage();
        }
    }

    public function executeQuery($query)
    {
        try {
            $data = $this->connect->query($query);
            return $data;
        } catch(PDOException $e) {
            echo "Exception: ". $e->getMessage();
        }
    }

    public function preExecute($query, $array)
    {
        try {
            $q = $this->connect->prepare($query);
            $q->execute($array);
            return $q;
        } catch(PDOException $e) {
            echo "Exception: " . $e->getMessage();
        }
    }
}
