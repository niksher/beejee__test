<?php

use Core\Controller;
use Core\Db;
use Core\View;

class LoginController extends Controller
{
    public $view;
    
    public function  __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        $data = null;

        if (isset($_POST['login'])) {
            $db = new Db();
            $data = $db->preExecute(<<<_____
                SELECT * 
                FROM `user` 
                WHERE `name`=:login 
_____
                , [
                    "login" => $_POST['login']
                ]
            );
            
            foreach ($data as $row) {
                if ($this->passwordHash() == $row["password"]) {
                    session_start();
                    $_SESSION["login"] = $_POST["login"];
                    $_SESSION["isAuth"] = true;
                    $this->isAdmin();
                } else {
                    $_SESSION["isAuth"] = false;
                    $data = "error";
                }
            }
        }
        $db = null;
        $this->view->generate('login.html.php', "template_view.php", $data);
    }
    
    private function passwordHash()
    {
        return hash("sha256", $_POST["password"]);
    }
    
    private function isAdmin()
    {
        if ($_POST["login"] == "admin") {
            header('Location:/admin/'); 
        }
    }
    
}
