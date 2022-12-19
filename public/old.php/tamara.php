<?php   
$is_image=$url == '/tamara/image';
$is_info=$url == '/tamara/info';
?>
<div class="block">Это описание кошки Тамары...<br>
Вы можете прочитать её анкету!
</div>

  
<div class="list"style="margin-left:30px;">
<a href="/tamara/info"><button type="button" class="btn btn-outline-warning">Описание Тамары</button></a>

<a href="/tamara/image"><button type="button" class="btn btn-outline-info" >Фото</button></a>

 
</div>


<?php if ($is_image) {?>
  
  <img src="/public/images/marusia_image.jpg" alt="">
  

  <?php
} else if($is_info){
      include 'tamara_info.php';

   }?>

<style>
  .block{
    margin: 15px;
padding:15px;}




</style>