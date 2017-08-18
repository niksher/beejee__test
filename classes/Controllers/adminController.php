<?php

use Core\Controller;
use Core\View;
use Models\Admin;

class AdminController extends Controller
{
    public function  __construct()
    {
        session_start();
        $this->model = new Admin();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->checkAuth();
        $data = $this->model->getData();
        $this->view->generate('admin.html.php', "template_view.php", $data);

    }

    public function action_action()
    {
        $this->checkAuth();
        if (isset($_POST["delete"])) {
            $this->delete($_POST["id"]);
        }
        if (isset($_POST["save"])) {
            $this->save($_POST["id"], $_POST["isDone"], $_POST["message"]);
        }
        
        header('Location:/admin/');
    }

    public function save($id, $isDone, $message)
    {
        $this->model->save((int)$id, (int)$isDone, $message);
    }

    public function delete($id)
    {
        $this->model->delete((int)$id);
    }

    public function checkAuth()
    {
        if (!isset($_SESSION["isAuth"]) && !$_SESSION["isAuth"] == true) {
            header('Location:/login/');
            exit;
        }
    }
}
