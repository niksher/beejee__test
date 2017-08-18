<?php

namespace Models;

use Core\Db;
use Core\Model;

class Admin extends Model
{
    public function getData()
    {
        $data = $this->execute(
            <<<_____
                SELECT * 
                FROM `task`
_____
        );
        return $data;
    }

    public function delete($id)
    {
        $this->preExec(
            <<<_____
                DELETE FROM `task` 
                WHERE `id`=:id
_____
            , [
                "id" => $id
            ]);
    }

    public function save($id, $isDone, $message)
    {
        $data = $this->preExec(
            <<<_____
                SELECT * 
                FROM `task` 
                WHERE `id`=:id
_____
            , [
                "id" => $id
            ]
        );
        foreach ($data as $row) {
            if ($row["id"] == $id) {
                $this->preExec(
                    <<<_____
                        UPDATE `task` 
                        SET 
                            `isDone`=:isDone
                            , `message`=:message
                        WHERE `id`=:id
_____
                    , [
                        "id" => $id
                        , "isDone" => $isDone
                        , "message" => $message
                    ]);
            }
        }
    }

    public function preExec($query, $array)
    {
        $db = new Db();
        return $db->preExecute($query, $array);
    }

    public function execute($query)
    {
        $db = new Db();
        return $db->executeQuery($query);
    }
}
