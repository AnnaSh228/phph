<?php
require_once "BaseTwigController.php";

class SearchController extends BaseTwigController {
    public $template = "search.twig";


    public function getContext(): array
    {
        $context=parent::getContext();

        $type=isset($_GET['type']) ? $_GET['type'] : '';
        $title=isset($_GET['title']) ? $_GET['title'] : '';
        $info=isset($_GET['info']) ? $_GET['info'] : '';
        $sql=<<<EOL
        SELECT id,title
        FROM cat_obj
        WHERE (:title='' OR title like CONCAT('%', :title, '%'))
        AND (type= :type OR :type='All') AND (:info='' OR info like CONCAT('%', :info, '%'))
        EOL;
        $query=$this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->execute();

        $context['objects']=$query->fetchAll();
        return $context;
        
    }
}