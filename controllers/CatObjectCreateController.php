<?php
require_once "BaseTwigController.php";

class CatObjectCreateController extends BaseTwigController {
    public $template = "cat_object_create.twig";
    public function get(array $context) // добавили параметр
    {
      
        
        parent::get($context); // пробросили параметр
    }
    public function post(array $context) { 
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";
        $sql = <<<EOL
        INSERT INTO cat_obj(title, description, type, info, image)
        VALUES(:title, :description, :type, :info, :image)
        EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image", $image_url); 
         $query->execute();

         $context['message'] = 'Вы успешно создали объект'; 
        $context['id'] = $this->pdo->lastInsertId(); 
        $this->get($context);
    }
}