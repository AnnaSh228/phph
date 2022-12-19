<?php
require_once "BaseTwigController.php";

class MainController extends BaseTwigController
{
    public $template = "main.twig";
    public $title = "Главная";


    public function getContext(): array
    {
        $link_page =  $_SERVER['REQUEST_URI'];
        if (isset($_SESSION['history'])) {
            if (count($_SESSION['history']) < 10) {
                $_SESSION['history'][] = $link_page;
            } else {
                for ($i = 1; $i < 10; $i++) {
                    $_SESSION['history'][$i - 1] = $_SESSION['history'][$i];
                }
                $_SESSION['history'][9] = $link_page;
            }
        } else {
            $_SESSION['history'] = array();
            $_SESSION['history'][] = $link_page;
        }
        foreach ($_SESSION['history'] as $page) {
        }

        $context = parent::getContext();
        if (isset($_GET['type'])) {
            $query = $this->pdo->prepare("SELECT * FROM cat_obj WHERE type =:type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM cat_obj");
        }


        $context["history"] = isset($_SESSION['history']) ? $_SESSION['history'] : "";

        $context['cat_obj'] = $query->fetchAll();

        return $context;
    }
}
