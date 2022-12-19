<?php
require_once "BaseTwigController.php";
class ObjectController extends BaseTwigController {
    public $template = "__object.twig"; 

    public function getContext(): array
    {
        $context = parent::getContext();
    
        if (isset($_GET['show']) && $_GET['show'] == 'image'){
            $query = $this->pdo->prepare("SELECT image, id FROM cat_obj WHERE id=".$this-> params['id']);
            $this->template = "base_image.twig"; 
            $query -> execute();
        } else if (isset($_GET['show']) && $_GET['show'] == 'info') {
            $query = $this->pdo->prepare("SELECT info, id FROM cat_obj WHERE id=".$this-> params['id']);
            $this->template = "marusia_info.twig"; 
           
            $query -> execute();

        }else{
            $query = $this->pdo->query("SELECT * FROM cat_obj");
        }
      
        $query = $this->pdo->query("SELECT id, image, info FROM cat_obj WHERE id=".$this->params['id']);
     
       
        $context['cat'] = $query->fetch();

        return $context;
    }
}