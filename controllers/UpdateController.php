<?php
require_once "BaseTwigController.php";

class UpdateController extends BaseTwigController
{
    public $template = "edit.twig";
    public function get(array $context)
    {
        $id = $this->params['id'];
        $sql = <<<EOL
               SELECT * FROM cat_obj WHERE id=:id
               EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();
        $data = $query->fetch();
        $context['object'] = $data;
        parent::get($context);
    }
    public function post(array $context)
    {
        $id = $this->params['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";
        $sql = <<<EOL
        UPDATE cat_obj SET title=:title, image=:image,
        description=:description, info=:info, type=:type WHERE id=:id
        EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image", $image_url);
        $query->execute();

        $context['message'] = 'Вы успешно изменили объект';
        $context['id'] = $this->pdo->lastInsertId();
        $this->get($context);
    }
}
