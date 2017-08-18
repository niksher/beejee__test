<?php

use Core\Controller;
use Core\View;
use Models\Main;

class IndexController extends Controller
{
    public $model;
    public $view;
    
    function  __construct()
    {
        $this->model = new Main();
        $this->view = new View();
    }

    function action_index()
    {
        $page = $_GET["page"] ? $_GET["page"] : 1;
        
        $data = $this->model->getData($_POST["option"], $_POST["sortType"], $page);
        $params = [
            "option" => $_POST["option"]
            , "sortType" => $_POST["sortType"]
            , "page" => $page
            , "total" => $this->model->getTotal()
        ];
        $this->view->generate('base.html.php', "template_view.php", $data, $params);
    }
}

