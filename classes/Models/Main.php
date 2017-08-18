<?php

namespace Models;

use Core\Db;
use Core\Model;

class Main extends Model
{
    function getData($sort = null, $asc = true, $page=1)
    {
        $offset = ($page - 1) * 3;
        $db = new Db();
        $query = <<<_____
            SELECT * 
            FROM task
_____
        ;
        
        if ($sort != null) {
            $query .= " ORDER BY " . $sort . " " . ($asc ? "ASC" : "DESC");
        }
        $query .= " LIMIT 3 OFFSET {$offset}";
        
        $data = $db->executeQuery($query);
        return $data;
    }
    
    
    function getTotal()
    {
        $db = new Db();
        $query = <<<_____
            SELECT COUNT(id) as cnt
            FROM task
_____
        ;
        
        $result = $db->executeQuery($query);
        foreach($result as $r) {
            return $r["cnt"];
        }
        
    }
}
